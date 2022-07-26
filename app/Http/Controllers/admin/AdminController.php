<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.admin');
    }

    function index() {
        // $data = Orderdetail::select(DB::raw('MONTH(created_at) as month'))->with(['order' => function($q){
        //     return $q->where('status', 7);
        // },'product:id,name,price,image'])
        // ->whereYear('created_at', date('Y'))->groupBy('month')->get();
        $order = Order::select(DB::raw('MONTH(created_at) as month, SUM(total) as total, MAX(total) as max'))->groupBy('month')->where('status',6)->get();
        $data2 = User::get();
        return view('admin.layout.home',[
            'order' => $order,
            'data2' => $data2,
        ]);
    }

    function liststaff() {
        $data = Admin::with(['level:id,name'])->where('id_level','!=','1')->get();
        return view('admin.staff.list',['data' => $data]);
    }

    function destroy($id) {
        $admi = Admin::find($id);
        $admi->delete();
        return redirect()->route('admin.liststaff');
    }

    public function listcus() {
        $data = User::simplepaginate(5);
        return view('admin.customer.list',['data' => $data]);
    }

    public function activecus($id) {
        $active = User::find($id);
        if($active->active == 1){
            $active->active = '0';
        }
        else {
            $active->active = '1';
        }
        $active->save();

        return redirect()->route('customer.list');
    }

    public function deletecus($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('customer.list');
    }
}

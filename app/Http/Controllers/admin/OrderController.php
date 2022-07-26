<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Importdetail;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class OrderController extends Controller
{
    public function list() {
        $data = Order::with('users:id,name')
        ->with('payments:id,method')
        ->with('ship:id,name')->get();
        return view('admin.order.list',['data' => $data,]);
    // return response()->json($data, 200);
    }

    public function orderDetail($id) {
        $data = Orderdetail::with(['order:id,quantity,total','receiver:id,name,email,phone,address', 'product:id,name,price,image,status']) 
        ->where('order_id',$id)->get();
        // ->where('orders', function($q) use ($id) {
        //     $q->where('id',$id);
        // })->get();
        return view('admin.order.detail',['data' => $data]);
        //  return response()->json($data, 200);
    }

    public function updatestatus($id) {
        $order = Order::find($id);
        // chờ xét duyệt
        // Mail::to('tuanpham0012@gmail.com')->send(new MailNotify($order));

        for($i = 0 ; $i < 6 ; $i++){
        if($order->status == 1){
            $order->status = 2;
            break;
        }
        // Đã xác nhận
        if($order->status == 2){
            $order->status = 3;
            // Mail::to('tuanpham0012@gmail.com')->send(new MailNotify($order));
            break;
        }
        // đang chuẩn bị hàng
        if($order->status == 3){
            $order->status = 4;
            break;
        }
        // Giao hàng
        if($order->status == 4){
            $order->status = 5;
            break;
        }
        // Xác nhận đã nhận hàng
        // if($order->status == 5){
        //     $order->status = 6;
        //     break;
        // }
        // xác nhận thành công
        // if($order->status == 6){
        //     $order->status = 7;
        //     break;
        // }
        }
        $order->save();
        return redirect()->route('admins.show_order')->with('success','Đã cập nhật trạng thái đơn hàng số '.$id);
    }

    public function orderPDF($id) {
        $data = Orderdetail::with(['order:id,quantity,total','receiver:id,name,email,phone,address', 'product:id,name,price','payment:id,method','ship:id,name']) 
        ->where('order_id',$id)->get();
        $data2 = Order::with('users:id,name')->where('id',$id)->get();

        $pdf = PDF::loadview('admin.order.orderPDF',[
            'data' => $data,
            'data2' => $data2,
        ]);
        return $pdf->download('order.pdf');
    }

    // public function impot() {
    //     $orderdetail = Orderdetail::with(['order:id,status','product:id'])
    // }

    public function turnover() {
        $order = Order::select(DB::raw('MONTH(created_at) as month, SUM(total) as total, COUNT(id) as count'))
        ->groupBy('month')->where('status',6)->get();
        // dd($order);
        return view('admin.order.turnover',['order' => $order]);
    }
}

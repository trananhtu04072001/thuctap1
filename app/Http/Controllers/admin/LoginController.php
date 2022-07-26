<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginform() {
        return view('admin.account.login');
    }
    function login(Request $req) {
        $email = $req->input('email');
        $password = $req->input('password');
        if(Auth::guard('admin')->attempt([
            'email' => $email,
            'password' =>$password,
            'active' => 1,
        ])){
            return redirect()->route('admin.home');
        }
        else {
            return redirect()->back()->with('error','Bạn không có quyền truy cập');
        }
    }

    function checkout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin');
    }

    function regis() {
        $data = Level::get();
        return view('admin.account.regis',['data' => $data]);
    }
    
    function formregis(StaffRequest $req) {
        $req->validated();
        $adm = new Admin();
        $adm->name = $req->name;
        $adm->email = $req->email;
        $adm->phone = $req->phone;
        $adm->address = $req->address;
        $adm->password = Hash::make($req->password);
        $adm->id_level = $req->id_level;
        $adm->save();
        return redirect()->route('admin.liststaff')->with('success','Thêm tài khoản thành công');
        // Admin::create($req->validated());
        // return redirect()->route('admin.liststaff');
    }
}

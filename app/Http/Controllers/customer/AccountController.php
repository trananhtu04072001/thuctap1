<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Customer;
use App\Models\Infor;
use App\Models\Type;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function register() {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data4['count'] = Cart::getcontent()->count();
        return view('customer.account.regis',$data4,[
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }

    public function regisform(CustomerRequest $req) {
        $req->validated();
        $customer = new User();
        $customer->name = $req->name;
        $customer->address = $req->address;
        $customer->email = $req->email;
        $customer->phone = $req->phone;
        $customer->password = Hash::make($req->password);
        $customer->save();

        // Session::push('users',[
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'address' => $req->address,
        //     'phone' => $req->phone,
        // ]);
        return redirect()->route('customer.login')->with('success','Đăng kí tài khoản thành công');
    }

    public function login() {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data4['count'] = Cart::getcontent()->count();
        return view('customer.account.login',$data4,[
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }

    public function loginform(LoginRequest $req) {
        $req->validated();
        $email = $req->input('email');
        $password = $req->input('password');
        if(Auth::guard('web')->attempt([
            'email' => $email, 
            'password' => $password,
            'active' => 1,
        ])){
        return redirect()->route('product.event')->with('success','Đăng nhập thành công');
    } 
    else {
        return redirect()->route('customer.login')->with('error','Bạn không có quyền đăng nhập');
    }
}

public function logout() {
    Auth::guard('web')->logout();
    // Session::flush();
    return redirect()->route('product.event');
}
}
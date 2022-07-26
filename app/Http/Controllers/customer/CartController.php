<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;

use App\Models\Infor;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Ship;
use App\Models\Type;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // public function cartlist() {
    //     $data1 = Type::get();
    //     $data2 = Infor::get();
    //     $data3 = Ship::get();
    //     $data4 = Payment::get();
    //     $data['cart'] = Cart::getcontent();
    //     $data['total'] = Cart::gettotal(0,"",'.');
    //     $data['count'] = Cart::getcontent()->count();
    //     return view('customer.cart.list',$data,[
    //         'data1' => $data1,
    //         'data2' => $data2,
    //         'data3' => $data3,
    //         'data4' => $data4,
    //     ]);
    // }

    public function addcart($id, Request $req) {
        $product = Product::find($id);
             Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => '1',
            'weight' => 0,
            'options' => array(
                'image' => $product->image,
            )
        ]);
        $carts = Session::get('carts');
        if(!$carts) {
            $carts = [
                $id => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => '1',
                    'options' => array(
                    'image' => $product->image,
                 )
                ]
                ];
        Session::put('carts', $carts); 
        return redirect('customer/cartlist')->with('success','Sản phẩm đã được thêm vào giỏ hàng');
    }
    if(isset($carts[$id])){
        $carts[$id]['quantity']++;
        Session::put('carts', $carts);
        return redirect('customer/cartlist')->with('success','Sản phẩm đã được thêm vào giỏ hàng');
    }

    $carts[$id] = [
        "name" => $product->name,
        "price" => $product->price,
        "quantity" => 1,
        'options' => array(
            'image' => $product->image,
        )
    ];
     session()->put('carts', $carts);
    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
}

    public function updatecart($id,Request $req) {
        $carts = Session::get('carts');
        if(isset($carts[$id])) {
            $carts[$id]['quantity'] = $req->quantity;
            Session::put('carts', $carts);
        }
        return redirect()->route('cart.list')->with('success','giỏ hàng đã được cập nhật');
    }

    public function removecart($id) {
        Cart::remove($id);
        $carts = Session::get('carts');
            if(isset($carts[$id])) {
                unset($carts[$id]);
                session()->put('carts', $carts);
            }
        return redirect()->route('cart.list')->with('Success','Sản phẩm đã được xoá khỏi giỏ hàng');
    }

    public function clearcart() {
        Cart::clear();
        Session::flush();
        return redirect()->route('cart.list');
    }
}

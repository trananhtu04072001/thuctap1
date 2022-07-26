<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiverRequest;
use App\Models\Infor;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Receiver;
use App\Models\Ship;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function infor(Request $req) {
        if(Auth::guard('web')->user() != null){
        $data1 = Type::get();
        $data2 = Infor::get();
        $data4['count'] = Cart::getcontent()->count();
        $data['cart'] = Cart::getcontent();
        $order = new Order();
        $order->id_user = Auth::guard('web')->user()->id;
        foreach(Cart::getcontent() as $val) {
        $order->quantity += $val->quantity;
        }
        $order->total = $req->total;
        if($req->des != ''){
        $order->des = $req->des;
        }
        else {
            $order->des = '';
        }
        $order->save();
        return redirect()->route('checkout.getinform');
    }
    else {
        return redirect()->route('customer.login')->with('error','Bạn cần đăng nhập để thanh toán');
    }
    }

    public function buypro($id) {
        if(Auth::guard('web')->user() != null){
            $data4['count'] = Cart::getcontent()->count();
            $data4['total'] = Cart::gettotal(0,"",'.');
            $data['cart'] = Cart::getcontent();
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
            $order = new Order();
            $order->id_user = Auth::guard('web')->user()->id;
            $order->quantity = 1;
            $order->total = $product->price;
            $order->des = '';
            $order->save();
            return redirect()->route('checkout.getinform');
        }
        else {
            return redirect()->route('customer.login')->with('error','Bạn cần đăng nhập để thanh toán');
        }
    }

    public function getinform() {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3 = Ship::get();
        $data4['count'] = Cart::getcontent()->count();
        $data4['total'] = Cart::gettotal(0,"",'.');
        $data5 = Payment::get();
        return view('customer.checkout.infor',$data4,[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data5' => $data5,
        ]);
    }
    public function postinform(ReceiverRequest $req) {
    if(Auth::guard('web')->user() != null){
        $receiver = new Receiver();
        $receiver->name = $req->name;
        $receiver->email = $req->email;
        $receiver->phone = $req->phone;
        $receiver->address = $req->address;
        $receiver->id_user = Auth::guard('web')->user()->id;
        $receiver->save();

        $id = Auth::guard('web')->user()->id;
        $order = Order::where('id_user',$id)->get();
        // $order_detail = new Orderdetail();
        // foreach($order as $item){
        // $order_detail->id_order = $item->id;
        // }
        // $order_detail->id_receiver = $receiver->id;
        if(Session::get('carts') != null){
            $ses = Session::get('carts');
            foreach($ses as $id => $val) {
                // dd($val['quantity']);
                $order_detail = new Orderdetail();
                foreach($order as $item){
                $order_detail->order_id = $item->id;
                }
                $order_detail->receiver_id = $receiver->id;
                $order_detail->product_id = $id;
                $order_detail->payment_id = $req->payment_id;
                $order_detail->ship_id = $req->ship_id;
                $order_detail->single_quantity = $val['quantity'];
                $order_detail->total = $req->total;
                $order_detail->save();
    }
    }
}
        // $order_detail->save();
        return redirect()->route('product.event')->with('success','Đặt hàng thành công,vui lòng chờ xét duyệt đơn hàng');
}
}
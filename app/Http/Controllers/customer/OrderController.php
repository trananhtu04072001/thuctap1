<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Infor;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Ship;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index($id) {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data5['count'] = Cart::getcontent()->count();
        $order = Order::with('users:id,name')->where('id_user',$id)->where('status','!=',6)->get();
        return view('customer.order.list',$data5,
        [
            'order' => $order,
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }

    public function history($id) {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data5['count'] = Cart::getcontent()->count();
        $order = Order::with('users:id,name')->where('id_user',$id)->where('status',6)->get();
        return view('customer.order.history',$data5,[
            'order' => $order,
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }

    public function detail($id) {
        $detail = Orderdetail::with(['order:id,quantity','receiver:id,name,email,phone,address','product:id,name,price,image','payment:id,method','ship:id,name,price'])
        ->where('order_id',$id)->get();
        return response()->json($detail, 200);
    }

    public function status($id) {
        $order = Order::find($id);
        for($i = 0 ; $i < 4 ; $i++){
            if($order->status == 1) {
                $order->status = 0;
                break;
            }
            if($order->status == 5) {
                $order->status = 6;
                break;
            }
            if($order->status == 0) {
                $order->status = 1;
                break;
            }
        }
        $order->save();
        return redirect()->route('order.index',Auth::guard('web')->user()->id);
    }

    public function rebuy($id) {
        $order = Order::find($id);
        $order_detail = Orderdetail::with('product:id,name,price,image')->where('order_id',$id)->get();
        // dd($order_detail);
        foreach($order_detail as $product){
            Cart::add([
                'id' => $product->product->id,
                'name' => $product->product->name,
                'price' => $product->product->price,
                'quantity' => $product->single_quantity,
                'weight' => 0,
                'options' => array(
                    'image' => $product->product->image,
                )
            ]);
        }
        // $cart = Cart::getcontent();
        // dd($cart);
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3 = Ship::get();
        $data4['count'] = Cart::getcontent()->count();
        $data4['total'] = Cart::gettotal(0,"",'.');
        $data5 = Payment::get();
        $reorder = new Order();
        $reorder->id_user = $order->id_user;
        $reorder->quantity = $order->quantity;
        $reorder->total = $order->total;
        $reorder->status = 1;
        $reorder->des = '';
        $reorder->save();
        return view('customer.checkout.infor',$data4,[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data5' => $data5,
        ]);
    }
}

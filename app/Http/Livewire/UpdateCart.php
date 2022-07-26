<?php

namespace App\Http\Livewire;

use App\Models\Infor;
use App\Models\Payment;
use App\Models\Receiver;
use App\Models\Ship;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdateCart extends Component
{
    public $qty = 1;
    public function increment($id) {
        $product = Cart::get($id);
        $qty = $product->quantity + 1;
        // $qty = $qty + 1;
        Cart::update($id,$qty);
    }
    public function decrement($id) {
        $product = Cart::get($id);
        if($product->quantity > 1){
        $qty = $product->quantity - 1;
        }
        else {
            Cart::remove($id);
        }
        // $qty = $qty + 1;
        Cart::update($id,$qty);
    }
    public function render()
    {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3 = Ship::get();
        $data4 = Payment::get();
        $data['cart'] = Cart::getcontent();
        $data['total'] = Cart::gettotal(0,"",'.');
        $data['count'] = Cart::getcontent()->count();
        $data['cart'] = Cart::getcontent();
        // if(Auth::guard('web')->user()->id != null){
        //     $id = Auth::guard('web')->user()->id;
        //     $data5 = Receiver::where('id_user',$id)->get();
        // }
        // else {
        //     $data5 = null;
        // }
        return view('livewire.update-cart',$data,[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            // 'data5' => $data5,
        ]);
    }
}

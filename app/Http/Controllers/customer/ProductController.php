<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Image;
use App\Models\Infor;
use App\Models\Product;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function detail($id) {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3 = DB::table('atrproducts')->join('products','atrproducts.id_product','=','products.id')->join('atributes','atrproducts.id_atr','=','atributes.id')
        ->select('products.id','atributes.value as value','atributes.id_atrgroup as id_atrgroup','atributes.id as idatr')->where('products.id',$id)->get();
        $data = Product::where('id',$id)->get();
        $data4 = Image::where('id_product',$id)->get();
        $data5['count'] = Cart::getcontent()->count();
        // up-view product
        $product = Product::find($id);
        $product->view += 1;
        $product->save();
        return view('customer.product.detail',$data5,[
            'data1' => $data1,
            'data2' => $data2,
            'data' => $data,
            'data3' => $data3,
            'data4' => $data4,
        ]);
    }

    public function eventproduct() {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3 = Banner::get();
        $data4['count'] = Cart::getcontent()->count();
        $data = DB::table('eventproducts')->join('events','eventproducts.id_event','=','events.id')->join('products','eventproducts.id_product','=','products.id')
        ->select('events.name as event','products.name as name','products.price as price','products.image as image','products.id as id','eventproducts.discount as discount',
                  'eventproducts.start as start','eventproducts.end as end')->get();

        $view = Product::orderBy('view')->where('view','>','0')->limit(10)->get();
        return view('customer.layout.home',$data4,[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data'=>$data,
            'view' => $view,
        ]);
    }

    public function list($id) {
        $data1 = Type::get();
        $data2 = Infor::get();
        $data3['count'] = Cart::getcontent()->count();
        if($id==0){
            $data = Product::where('status','1')->simplepaginate();
        }
        else {
        $data = Product::where('status','1')->where('id_type',$id)->simplepaginate(10);
        }
        return view('customer.product.list',$data3,[
            'data1' => $data1,
            'data2' => $data2,
            'data' => $data,
        ]);
    }
}

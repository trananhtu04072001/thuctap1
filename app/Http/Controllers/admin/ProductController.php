<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Atribute;
use App\Models\AtrProduct;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function list(){
        $data = Product::simplepaginate(5);
        return view('admin.products.listproduct',['data' => $data]);
    }

    function add(){
        $data1 = Type::get();
        $data2 = Brand::get();
        $data3 = Atribute::get();
        return view('admin.products.addproduct',[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3
        ]);
    }

    function formadd(ProductRequest $req){
        $product = new Product();
        $product->name = $req->name;
        $product->price = $req->price;
        // if($req->hasFile('image')){
        //     $file = $req->file('image');
        //     $dir = date('Y/m/d');
        //     $path = Storage::disk('public')->path($dir);
        //     $imageName = time().'.'.$file->getClientOriginalExtension();
        //     $file->move($path, $imageName);
        //     $product->image = Storage::disk('public')->url($dir . "/" . $imageName);
        // }
        if($req->hasFile('image')){
            $file = $req->file('image');
            // $path = public_path().'/storage/';
            $path = 'storage/product';
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $image = $file->move($path,$imageName);
            $product->image = $image;  
        }
        $product->des = $req->des;
        $product->id_brand = $req->id_brand;
        $product->id_type = $req->id_type;
        $product->save();

        foreach($req->id_atr as $item){
            AtrProduct::create([
                'id_product'=> $product->id,
                'id_atr'=> $item,
            ]);
        }

        // $files = $req->file('images');
        // dd($files);
        // $productImage = new Image();
        if($req->hasFile('images')){
            $files = $req->file('images');
            foreach($files as $file){
                $paths = 'storage/imagedetail';
                // $imageNames = time().$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $imageNames = $file->getClientOriginalName();
                $image = $file->move($paths,$imageNames);
                $productImage = new Image();
                $productImage->id_product = $product->id;
                $productImage->image = $image;
                $productImage->save();
            }
        }
        return redirect()->route('product.list');
    }

    function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.list');
    }
    
    function detail($id) {
        $detail1 = Product::where('id',$id)->get();
        $detail2 = Image::where('id_product',$id)->get();
        return view('admin.products.detail',[
            'detail1' => $detail1,
            'detail2' => $detail2,
        ]);
    }

    function update($id) {
        $data1 = Type::get();
        $data2 = Brand::get();
        $data3 = Atribute::get();
        $data4 = Image::where('id_product','=',$id)->get();
        return view('admin.products.update',[
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
        ]);
    }

    function updateform($id, Request $req) {
        $product = Product::find($id);
        $product->name = $req->name;
        $product->price = $req->price;
        // if($req->hasFile('image')){
        //     $file = $req->file('image');
        //     $dir = date('Y/m/d');
        //     $path = Storage::disk('public')->path($dir);
        //     $imageName = time().'.'.$file->getClientOriginalExtension();
        //     $file->move($path, $imageName);
        //     $product->image = Storage::disk('public')->url($dir . "/" . $imageName);
        // }
        if($req->hasFile('image')){
            $file = $req->file('image');
            // $path = public_path().'/storage/';
            $path = 'storage/product';
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $image = $file->move($path,$imageName);
            $product->image = $image;  
        }
        $product->des = $req->des;
        $product->id_brand = $req->id_brand;
        $product->id_type = $req->id_type;
        $product->save();

        foreach($req->id_atr as $item){
            AtrProduct::where('id_product','=',$id)->create([
                'id_product'=> $product->id,
                'id_atr'=> $item,
            ]);
        }


        if($req->hasFile('images')){
            $files = $req->file('images');
            foreach($files as $file){
                $paths = 'storage/imagedetail';
                // $imageNames = time().'.'.$file->getClientOriginalExtension();
                $imageNames = $file->getClientOrginalName();
                $imagede = $file->move($paths,$imageNames);
                $productImage = Image::where('id_product',$id);
                $productImage->image = $imagede;
                $productImage->save();

            }
        }
        return redirect()->route('product.list');
    }
}

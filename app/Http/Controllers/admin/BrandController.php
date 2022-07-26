<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function list() {
        $data = Brand::simplepaginate(5);
        return view('admin.brand.list',['data'=> $data]);
    }

    function add() {
        return view('admin.brand.insert');
    }

    function formadd(Request $req){
        $brand = new Brand();
        $brand->name = $req->brand;
        $brand->save();
        return redirect()->route('brand.list');
    }

    function destroy($id){
        $des = Brand::find($id);
        $des->delete();
        return redirect()->route('brand.list');
    }
}

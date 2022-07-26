<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function list(){
        $data = Banner::simplepaginate(5);
        return view('admin.banner.list',['data'=>$data]);
    }

    function add() {
        return view('admin.banner.add');
    }
    
    function formadd(Request $req) {
        $banner = new Banner();
        $banner->title = $req->title;
        if($req->hasFile('images')){
            $file = $req->file('images');
            $path = 'storage/banners';
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $image = $file->move($path,$imageName);
            $banner->image = $image;  
        }
        $banner->des = $req->des;
        $banner->save();

        return redirect()->route('banner.list');
    }

    function destroy($id) {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->route('banner.list');
    }
}

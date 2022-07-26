<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Infor;
use Illuminate\Http\Request;

class InforController extends Controller
{
    function list() {
       $data = Infor::get();
        return view('admin.infor.list',['data'=>$data]);
    }

    function update() {
        return view('admin.infor.update');
    }

    function updateform($id, Request $req) {
        $infor = Infor::find($id);
        $infor->hotline = $req->hotline;
        $infor->email = $req->email;
        $infor->address = $req->address;
        $infor->save();

        return redirect()->route('infor.list');
    }
}

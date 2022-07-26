<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    function list() {
        $data1 = Type::simplepaginate(5);
        //$data = Type::get();
        return view('admin.type.listtype',['data1' => $data1]);
    }

    function add() {
        return view('admin.type.insert');
    }

    function formadd(Request $req) {
        $type = new Type();
        $type->name = $req->type;
        $type->save();
        return redirect()->route('type.list');
    }

    function destroy($id) {
        $typ = Type::find($id);
        $typ->delete();
        return redirect()->route('type.list');
    }
}

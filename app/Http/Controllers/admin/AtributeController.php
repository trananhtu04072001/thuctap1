<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atribute;
use App\Models\AtributeGroup;
use Illuminate\Support\Facades\DB;

class AtributeController extends Controller
{
    function list() {
        $data = Atribute::with('atrgroup:id,name')->get();
        return view('admin.atribute.list', ['data' => $data]);
    }

    function add() {
        $atr = AtributeGroup::get();
        return view('admin.atribute.add',['atr' => $atr]);
    }

    function addlist(Request $req) {
        $atr = new Atribute();
        $atr->id_atrgroup = $req->id_atrgroup;
        if($req->id_atrgroup == 1){
            $atr->value = $req->color;
        }
        else{
            $atr->value = $req->value;
        }
        // $atr->value = $req->value;
        $atr->save();
        return redirect()->route('atribute.list')->with('success','Thêm thuộc tính thành công');
    }

    function destroy($id) {
        $atr = Atribute::find($id);
        $atr->delete();
        return redirect()->route('atribute.list');
    }

    function listgroup() {
        $data = AtributeGroup::simplepaginate(5);
        return view('admin.atribute.group',['data' => $data]);
    }

    function addgroup() {
        return view('admin.atribute.addgroup');
    }

    function groupform(Request $req){
        $atr = new AtributeGroup();
        $atr->name = $req->name;
        $atr->save();
        return redirect()->route('atribute.group')->with('success','Thêm nhóm thuộc tính thành công');
    }

    public function destroygro($id) {
        $atr = AtributeGroup::find($id);
        $atr->delete();
        return redirect()->route('atribute.group')->with('success','Xoá nhóm thuộc tính thành công');
    }
}

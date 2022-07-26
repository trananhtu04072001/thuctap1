<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    function list() {
        // $data = Level::get();
        $data = Level::simplepaginate(5);
        return view('admin.level.listlevel',['data' => $data]);
    }
    function add() {
        return view('admin.level.addlevel');
    }
    function addform(Request $req) {
        // $this->validate($req,
        // [
        //     'name'=>'required'
        // ],
        // [
        //     'name.required'=>'Vui lòng nhập chứng chỉ'
        // ]);
        $lev = new Level();
        $lev->name = $req->level;
        $lev->save();
        return redirect()->route('admin.listlevel');
    }

    // function addform(LevelRequest $req){
    //     $data = $req->validated();
    //     return Level::create($data)->redirect()->route('admin.listlevel');
    // }

    function destroy($id) {
        $lev = Level::find($id);
        $lev->delete();
        return redirect()->route('admin.listlevel');
    }
}

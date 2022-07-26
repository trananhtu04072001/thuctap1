<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    function list() {
        $data = Ship::simplepaginate(5);
        return view('admin.ship.list',['data'=>$data]);
    }

    function add() {
        return view('admin.ship.add');
    }

    function formadd(Request $req) {
        $ship = new Ship();
        $ship->name = $req->ship;
        $ship->price = $req->price;
        $ship->save();
        return redirect()->route('ship.list');
    }

    function destroy($id){
        $ship = Ship::find($id);
        $ship->delete();
        return redirect()->route('ship.list');
    }
}

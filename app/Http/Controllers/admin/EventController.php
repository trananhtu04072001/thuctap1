<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function list() {
        $data = EventProducts::with(['event:id,name','product:id,name'])->get();
        return view('admin.even.listpro',['data' => $data]);
    }

    function add() {
        $data1 = Product::get();
        $data2 = Event::get();
        return view('admin.even.addpro',[
            'data1' => $data1,
            'data2' => $data2
        ]);
    }

    function addform(Request $req) {
        $event = new EventProducts();
        $event->id_event = $req->id_event;
        $event->id_product = $req->id_product;
        $event->discount = $req->value;
        $event->start = $req->start;
        $event->end = $req->end;
        $event->save();

        return redirect()->route('event.list');
    }

    function addevent() {
        return view('admin.even.add');
    }

    function formadd(Request $req) {
        $eve = new Event();
        $eve->name = $req->event;
        $eve->save();
        return redirect()->route('event.list');
    }

    public function destroy($id) {
        $event = EventProducts::find($id);
        $event->delete();
        return redirect()->route('event.list');
    }
}

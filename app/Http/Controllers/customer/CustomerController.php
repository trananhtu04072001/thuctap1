<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Infor;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    function index() {
        $data1 = Type::get();
        $data2 = Infor::get();
         return view('customer.layout.layout',[
            'data1' => $data1,
            'data2' => $data2,
        ]);
    }
}

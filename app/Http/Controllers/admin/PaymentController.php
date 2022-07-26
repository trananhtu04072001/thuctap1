<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list() {
        $data = Payment::simplepaginate(5);
        return view('admin.payment.list',['data'=>$data]);
    }

    public function addpayment() {
        return view('admin.payment.add');
    }

    public function postpayment(Request $req) {
        $payment = new Payment();
        $payment->method = $req->payment;
        $payment->save();
        return redirect()->route('payment.list');
    }

    public function deletepayment($id) {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payment.list');
    }
}

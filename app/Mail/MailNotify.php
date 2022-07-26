<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('04072001trananhtu@gmail.com')->view('customer.mail.sendmail')
        ->subject('Xác nhận đơn hàng');
        // if (Auth::guard('web')->user() != null){
        //     $id = Auth::guard('web')->user()->id;
        //     $order = Order::where('id_user',$id)->get();
        //     if(isset($order->status) && $order->status == 2) {
        // return $this->form('04072001trananhtu@gmail.com')->view('customer.mail.sendmail')
        // ->subject('Xác nhận đơn hàng');
        //     }
        // }
    }
}

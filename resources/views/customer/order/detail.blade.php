@extends('customer.layout.layout')
@section('title','Chi tiết đơn hàng')
@section('css')
@stop
@section('content')
<h2 class="text-center">Thông tin đơn hàng</h2>
<div style="clear: both"></div>
<div class="orderdetail">
<table class="text-center">
    <tr>
        <th>Tên người nhận:</th>
        <th>Email</th>
        <th>SĐT:</th>
        <th>Địa chỉ:</th>
    </tr>
    <tr>
        @foreach ($detail as $order)
        @endforeach
        <td>{{$order->receiver->name}}</td>
        <td>{{$order->receiver->email}}</td>
        <td>{{$order->receiver->phone}}</td>
        <td>{{$order->receiver->address}}</td>
    </tr>
    <tr>
        <th>Sản phẩm</th>
        @foreach ($detail as $order)
        <td class="orderprod">
            <img src="{{asset($order->product->image)}}" alt="error" style="width:100px">
            <br>
            <span>{{$order->product->name}}</span>
            <br>
            {{number_format($order->product->price, 0, ',', '.')}} VND
            <br>
            <span>Số lượng: {{$order->single_quantity}}</span>
        </td>
        @endforeach
    </tr>
    <tr>
        <th>Vận chuyển:</th>
        <td>{{$order->ship->name}}-{{number_format($order->ship->price, 0, ',', '.')}} VND</td>
        <th>Thanh toán:</th>
        <td>{{$order->payment->method}}</td>
    </tr>
    <tr>
        <th>Tổng số lượng:</th>
        <td colspan="3">{{$order->order->quantity}} sản phẩm</td>
    </tr>
    <tr>
        <th>Tổng giá tiền:</th>
        <td colspan="3">{{number_format($order->total, 0, ',', '.')}} VND</td>
    </tr>
</table>
<br>
</div>
@endsection
@section('js')
@stop
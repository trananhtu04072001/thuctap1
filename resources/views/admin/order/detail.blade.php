@extends('admin.layout.layout')
@section('title','Chi tiết đơn hàng')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
        @foreach ($data as $order)
        @endforeach
        <td>{{$order->receiver->name}}</td>
        <td>{{$order->receiver->email}}</td>
        <td>{{$order->receiver->phone}}</td>
        <td>{{$order->receiver->address}}</td>
    </tr>
    <tr>
        <th>Sản phẩm</th>
        @foreach ($data as $order)
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
<div class="text-center">
    <form action="{{route('admin.order.pdf',$order->order->id)}}">
<button formtarget="_blank" type="submit" id="btn-print" class="btn btn-primary my-2 my-sm-0 " ><i class="fas fa-save"></i> In hoá đơn </button>
    </form>
</div>
</div>
@endsection
@section('js')
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
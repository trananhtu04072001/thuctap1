@extends('admin.layout.layout')
@section('title','Thông tin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h2 class="text-center">Thông tin</h2>
@foreach ($data as $item)
<a href="{{route('infor.update',$item->id)}}" class="nav-link">Cập nhật</a>
<div style="clear: both"></div>
<table class="text-center infor">
    <tr>
        <td>SĐT</td>
        <td>{{$item->hotline}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$item->email}}</td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td>{{$item->address}}</td>
    </tr>
    <tr>
        <td>Ngày cập nhật</td>
        <td>{{$item->updated_at}}</td>
    </tr>
    @endforeach
</table>
@endsection
@section('js')
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
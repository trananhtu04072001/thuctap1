@extends('admin.layout.layout')
@section('title','chi tiết Nhập hàng')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h1 class="text-center">Chi tiết Nhập hàng</h1>
<br>
<table class="importdetail">
    @foreach ($data as $detail)
    <tr>
        <th>Mã Nhập:</th>
        <td>{{$detail->import->code_import}}</td>
    </tr>
    <tr>
        <th>Sản phẩm:</th>
        <td>{{$detail->product->name}}</td>
    </tr>
    <tr>
        <th>Đơn giá:</th>
        <td>{{number_format($detail->import->unit_price, 0, ',', '.')}} VND</td>
    </tr>
    <tr>
        <th>Số lượng:</th>
        <td>{{$detail->quantity}} sản phẩm</td>
    </tr>
    <tr>
        <th>Nơi nhập:</th>
        <td>{{$detail->import->supplier}}</td>
    </tr>
    <tr>
        <th>Ngày nhập:</th>
        <td>{{$detail->import->importdate}}</td>
    </tr>
    <tr>
        <th>Tổng cộng:</th>
        <td>{{number_format(($detail->import->unit_price)*($detail->import->quantity), 0, ',', '.')}} VND</td>
    </tr>
</table>
<br>
<div class="text-center">
    <form action="{{route('import.pdf',$detail->import->id)}}">
        @endforeach
<button formtarget="_blank" type="submit" id="btn-print" class="btn btn-primary my-2 my-sm-0 " ><i class="fas fa-save"></i> Lưu </button>
    </form>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
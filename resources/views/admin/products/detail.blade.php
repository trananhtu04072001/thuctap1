@extends('admin.layout.layout')
@section('title','Chi tiết sản phẩm')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<div style="clear: both"></div>
<table class="text-center detail">
    @foreach ($detail1 as $item)
    <tr>
        <td rowspan="3">
            <img src="{{ asset($item->image)}}" alt="{{$item->id}}" style="width:200px;">
             <br>
            @foreach ($detail2 as $image)
               <img src="{{ asset($image->image)}}" alt="{{$image->id}}" style="width:100px;">
            @endforeach
        </td>
        <td>
            {{$item->name}}
            <br>
            {{number_format($item->price, 0, ',', '.')}} VND
            <br>
            {{$item->des}}
            <br>
            <span>Lượt xem sản phẩm:</span> {{$item->view}} <span>lượt xem</span>
            <br>

        </td>
    </tr>
    @endforeach
</table>
<footer class="text-center">
{{-- {{ $data->withQueryString()->links() }} --}}
</footer>
@endsection
@section('js')
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
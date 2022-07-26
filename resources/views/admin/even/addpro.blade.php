@extends('admin.layout.layout')
@section('title','Thêm sự kiện sản phẩm')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h1 class="text-center">Thêm sự kiện sản phẩm</h1>
<form method="POST" class="eventpro">
    @csrf
    <select name="id_event" class="form-select">
      <option value="#" selected>sự kiện</option>
    @foreach ($data2 as $event)
      <option value="{{$event->id}}">{{$event->name}}</option>
    @endforeach
    </select>
      <br>
      <div>
        <span>Sản phẩm áp dụng</span>
        <br>
        @foreach ($data1 as  $value)
        <label for="{{$value->id}}">{{$value->name}}</label>
        <input type="checkbox" name="id_product" id="{{$value->id}}" value="{{$value->id}}">&nbsp;&nbsp;
        @endforeach
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Triết khấu %</span>
        <input type="text" class="form-control" placeholder="Triết khấu %:"
         aria-label="Username" aria-describedby="addon-wrapping" name="value">
      </div>
      <br>
      <div>
        <label for="start">Bắt đầu</label>
        <input type="date" name="start" id="start">
      </div>
      <br>
      <div>
        <label for="end">kết thúc</label>
        <input type="date" name="end" id="end">
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Thêm</button>
      </div>
</form>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
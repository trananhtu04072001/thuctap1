@extends('admin.layout.layout')
@section('title','Cập nhật thông tin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h1 class="text-center">Cập nhật</h1>
<form method="POST" class="inforup">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Số điện thoại</span>
        <input type="text" class="form-control" placeholder="Số điện thoại:"
         aria-label="Username" aria-describedby="addon-wrapping" name="hotline">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Email</span>
        <input type="text" class="form-control" placeholder="email:"
         aria-label="Username" aria-describedby="addon-wrapping" name="email">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Địa chỉ</span>
        <input type="text" class="form-control" placeholder="Địa chỉ:"
         aria-label="Username" aria-describedby="addon-wrapping" name="address">
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Cập nhật</button>
      </div>
</form>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
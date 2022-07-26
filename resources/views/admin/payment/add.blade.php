@extends('admin.layout.layout')
@section('title','Thêm loại')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<br>
<h1 class="text-center">Thêm phương thức</h1>
<form method="POST" class="typeform">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Phương thức</span>
        <input type="text" class="form-control" placeholder="phương thức:"
         aria-label="Username" aria-describedby="addon-wrapping" name="payment">
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
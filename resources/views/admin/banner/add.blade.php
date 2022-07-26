@extends('admin.layout.layout')
@section('title','Thêm banner')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h1 class="text-center">Thêm banner</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('banner.post')}}" class="bannerform">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên tiêu đề</span>
        <input type="text" class="form-control" placeholder="Tên tiêu đề:"
         aria-label="Username" aria-describedby="addon-wrapping" name="title">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Ảnh</span>
        <input type="file" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="images">
    </div>
    <br>
    <div>
        <label for="textarea">Miêu tả</label>
        <br>
        <textarea name="des" id="textarea" cols="50" rows="10"></textarea>
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
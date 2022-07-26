@extends('admin.layout.layout')
@section('title','sửa tài khoản nhân viên')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<h1 class="text-center">Thêm nhân viên</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" class="col-md-4">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Họ và tên</span>
        <input type="text" class="form-control" placeholder="Họ và tên:"
         aria-label="Username" aria-describedby="addon-wrapping" name="name">
      </div>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Email</span>
        <input type="text" class="form-control" placeholder="Email:"
         aria-label="Username" aria-describedby="addon-wrapping" name="email">
      </div>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">SĐT</span>
        <input type="text" class="form-control" placeholder="Phone"
         aria-label="Username" aria-describedby="addon-wrapping" name="phone">
      </div>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Địa chỉ</span>
        <input type="text" class="form-control" placeholder="address"
         aria-label="Username" aria-describedby="addon-wrapping" name="address">
      </div>
      <select name="id_level" class="form-select">
        <option value="#" selected>Chức vụ</option>
      @foreach ($data as $level)
        <option value="{{$level->id}}">{{$level->name}}</option>
      @endforeach
      </select>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Mật khẩu</span>
        <input type="text" class="form-control" placeholder="password"
         aria-label="Username" aria-describedby="addon-wrapping" name="password">
      </div>
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
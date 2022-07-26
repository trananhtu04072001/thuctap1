@extends('customer.layout.layout')
@section('title','Đăng nhập')
@section('content')
<div class="regiscus">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" class="col-md-4 regiscustomer">
    @csrf
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Email hoặc SĐT</span>
        <input type="text" class="form-control" placeholder="email"
         aria-label="Username" aria-describedby="addon-wrapping" name="email">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Mật khẩu</span>
        <input type="password" class="form-control" placeholder="password"
         aria-label="Username" aria-describedby="addon-wrapping" name="password">
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Đăng nhập</button>
      </div>
      <br>
      <a href="{{route('customer.regis')}}">Bạn chưa có tài khoản ?</a>
</form>
</div>
@endsection
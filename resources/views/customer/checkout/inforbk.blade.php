@extends('customer.layout.layout')
@section('title','Thông tin người nhận')
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
<form method="POST" class="col-md-4 regiscustomer" action="{{route('checkout.inform')}}">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Họ và tên</span>
        <input type="text" class="form-control" placeholder="Họ và tên:"
         aria-label="Username" aria-describedby="addon-wrapping" name="name">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Email</span>
        <input type="text" class="form-control" placeholder="Email:"
         aria-label="Username" aria-describedby="addon-wrapping" name="email">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">SĐT</span>
        <input type="text" class="form-control" placeholder="Phone"
         aria-label="Username" aria-describedby="addon-wrapping" name="phone">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Địa chỉ</span>
        <input type="text" class="form-control" placeholder="address"
         aria-label="Username" aria-describedby="addon-wrapping" name="address">
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Thông tin người nhận</button>
      </div>
</form>
</div>
@endsection
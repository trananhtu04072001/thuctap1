@extends('customer.layout.layout')
@section('title','Tất cả sản phẩm')
@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
@foreach ($data as $product)
<div class="col mb-5">
    <div class="listproduct card h-100">
        <!-- Sale badge-->
        {{-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">giảm {{$event->discount}} %</div> --}}
        <!-- Product image-->
        <a href="{{route('cusproduct.detail',$product->id)}}" class="product" name="view">
        <img class="card-img-top" src="{{asset($product->image)}}" alt="..." />
        </a>
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{$product->name}}</h5>
                <!-- Product reviews-->
                {{-- <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div> --}}
                <!-- Product price-->
                <span class="text-muted ">{{number_format($product->price, 0, ',', '.')}} VND</span>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('checkout.buy',$product->id)}}">Mua hàng</a></div>
            <br>
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('cart.add',$product->id)}}">Thêm vào giỏ hàng</a></div>
        </div>
    </div>
</div>
@endforeach
    </div>
</div>
@endsection
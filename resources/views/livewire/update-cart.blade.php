@extends('customer.layout.layout')
@section('title','Giỏ hàng')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="cart_area section_padding_100 clearfix">
<form method="POST" action="{{route('checkout.infor')}}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('carts') != null)
                              @forelse (session('carts') as $id => $val)
                            <tr>
                                <td class="cart_product_img d-flex align-items-center">
                                    {{-- <a href="#"><img src="img/product-img/product-9.jpg" alt="Product"></a> --}}
                                    <div class="row" name="product" value="{{$id}}">
                                        <h6>{{$val['name']}}</h6>
                                    </div>
                                </td>
                                <td class="price"><span>{{number_format($val['price'], 0, ',', '.')}} VND</span></td>
                                <td class="qty">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{$val['quantity']}}">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                </td>
                                <td> <span class="close"><a href="{{ route('cart.remove',$id)}}">&#10005;</a></span></td>
                                <td><span><a href="{{route('cart.update',$id)}}">Cập nhật</a></span></td>
                            </tr>
                            @empty
                            <tr>
                                <td>Giỏ hàng rỗng</td>
                            </tr>
                      @endforelse
                         @endif
                        </tbody>
                    </table>
                </div>

                <div class="cart-footer d-flex mt-30">
                    <div class="back-to-shop w-50">
                        <a href="{{route('product.event')}}">Mua tiếp sản phẩm</a>
                    </div>
                    <div class="update-checkout w-50 text-right">
                        <a href="{{route('cart.clear')}}">Xoá giỏ hàng</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            {{-- <div class="col-12 col-md-6 col-lg-4">
                <div class="coupon-code-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Voucher giảm giá</h5>
                        <p>Enter your cupone code</p>
                    </div>
                    <form action="#">
                        <input type="search" name="search" placeholder="#569ab15">
                        <button type="submit">Áp dụng</button>
                    </form>
                </div>
            </div> --}}
            <div class="col-12 col-md-6 col-lg-4">
                {{-- <div class="shipping-method-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Phương thức vận chuyển</h5>
                        <p>Select the one you want</p>
                    </div>

                    @foreach ($data3 as $ship)
                    <div class="custom-control custom-radio mb-30">
                        <input type="radio" id="customRadio1" name="ship" class="custom-control-input" value="{{$ship->id}}">
                        <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>{{$ship->name}}</span><span>{{number_format($ship->price, 0, ',', '.')}} VND</span></label>
                    </div>
                    @endforeach
                </div> --}}
                <div class="shipping-method-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Ghi chú</h5>
                        <p>Điền thông tin cần ghi chú</p>
                    </div>

                    <div class="custom-control custom-radio mb-30">
                        <textarea name="des" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>  
            <div class="col-12 col-lg-4">
                <div class="cart-total-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Giỏ hàng tạm tính</h5>
                    </div>

                    <ul class="cart-total-chart">
                        <li><span>Sản phẩm:</span> <span>{{$count}} Sản phẩm</span></li>
                        <li><span><strong>Tạm tính:</strong></span> <span><strong><input type="hidden" name="total" value="{{$total}}"><strong>{{number_format($total, 0, ',', '.')}} VND</strong></span></li>
                    </ul>
                    <button type="submit" class="btn karl-checkout-btn">checkout</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
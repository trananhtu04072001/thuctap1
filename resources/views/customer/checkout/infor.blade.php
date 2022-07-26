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
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Địa chỉ nhận hàng</h5>
                        <p>Điền đầy đủ thông tin</p>
                    </div>

                    <form action="{{route('checkout.inform')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="first_name">Tên người nhận <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" value="" name="name">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Địa chỉ nhận hàng <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address" value="" name="address">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Số điện thoại <span>*</span></label>
                                <input type="number" class="form-control" id="phone_number" min="0" value="" name="phone">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email <span>*</span></label>
                                <input type="email" class="form-control" id="email_address" value="" name="email">
                            </div>
                            <div class="shipping-method-area mt-70">
                                <div class="cart-page-heading">
                                    <h5>Phương thức vận chuyển</h5>
                                    <p>Select the one you want</p>
                                </div>
            
                                @foreach ($data3 as $ship)
                                <div class="custom-control custom-radio mb-30">
                                    <input type="radio" id="{{$ship->name}}" name="ship_id" class="custom-control-input" value="{{$ship->id}}">
                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="{{$ship->name}}"><span>{{$ship->name}}</span><span>{{number_format($ship->price, 0, ',', '.')}} VND</span></label>
                                </div>
                                @endforeach
                            </div>
                            <div class="shipping-method-area mt-70">
                                <div class="cart-page-heading">
                                    <h5>Hình thức thanh toán</h5>
                                    <p>Chọn hình thức thanh toán</p>
                                </div>
            
                                @foreach ($data5 as $payment)
                                <div class="custom-control custom-radio mb-30">
                                    <input type="radio" id="{{$payment->method}}" name="payment_id" class="custom-control-input" value="{{$payment->id}}">
                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="{{$payment->method}}"><span>{{$payment->method}}</span></label>
                                </div>
                                @endforeach
                                <div id="stk" style="display:none;">
                                    <span>STK Shop: 210241241414</span><br>
                                    <span>Ngân hàng: Vietcombank</span><br>
                                    <span>Tên TK: Trần Anh Tú</span>
                                </div>
                            </div>
                            <input type="hidden" name="total" value="" id="totalinput">
                        </div>
                        <button class="btn karl-checkout-btn" type="submit">Tạo hoá đơn</button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Hoá đơn của bạn</h5>
                        <p>Chi tiết</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>SL sản phẩm</span> <span>Tạm tính</span></li>
                        <li><span>{{$count}} Sản phẩm</span> <span>{{number_format($total, 0, ',', '.')}} VND</span></li>
                        <li><span>Đơn vị vận chuyển</span> <span id="ship_name"></span></li>
                        <li><span>Tổng tiền thanh toán</span> <span id="total">{{number_format($total, 0, ',', '.')}} VND</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- <div id="demo"></div> --}}
@endsection
@section('js')
<script type="text/javascript">
var ships = @json($data3);
var total = {{$total}};
   function moneyfomart(value) {
    let numbe = value.toLocaleString("it-IT", {style:"currency", currency:"VND"});
    return numbe;
   }
    $('input[name=ship_id]').on('change', function() {
        var vale = $('input[name=ship_id]:checked').val();
        // var ships = @json($data3);
        ships.forEach(function(item,index){
            if(item.id == vale ) {
                let num = Number(total)+Number(item.price);
                let price = Number(item.price);
            $('#ship_name').text(item.name+'-'+ moneyfomart(price));
            $('#total').text(moneyfomart(num));
            $('#totalinput').val(num);
            return;
            }
        });
});
</script>
<script>
    $('input[name=payment_id]').on('change', function() {
        // alert('phương thức thanh toán');
        var valu = $('input[name=payment_id]:checked').val();
        if(valu == 2){
            $('#stk').css('display','block');
        }
        else {
            $('#stk').css('display','none');
        }
    });
</script>
@endsection
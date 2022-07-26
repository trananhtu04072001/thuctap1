@extends('customer.layout.layout')
@section('title','Chi tiết sản phẩm')
@section('content')
<main class="containerl">
  
    <!-- Left Column / Headphones Image -->
    <div class="imagedetail">
        @foreach ($data4 as $image)
        <img data-image="blue" src="{{asset($image->image)}}" alt="">
        @endforeach
    </div>
    <div class="left-column">
    @foreach ($data as $detail)
      <img data-image="red" class="active" src="{{asset($detail->image)}}" alt="">
    </div>
    
    
    <!-- Right Column -->
    <div class="right-column">
    
      <!-- Product Description -->
      <div class="product-description">
        <span>sản phẩm chi tiết</span>
        <h1>{{$detail->name}}</h1>
        <p>{{$detail->des}}</p>
      </div>
      @endforeach
      <!-- Product Configuration -->
      <div class="product-configuration">
    
        <!-- Product Color -->
        <span>Màu sắc & kích thước</span>
        @foreach ($data3 as $atribute)
        @if($atribute->id_atrgroup == 1)
        <div class="product-color">
    
          <div class="color-choose">
            <div>
                <input type="checkbox" name="id_atr[]" id="" value="{{$atribute->id}}">&nbsp;<i class="fa-solid fa-brush" style="color:{{$atribute->value}}"></i>
                <i class="fa-solid fa-brush" style="color:black"></i>
            </div>
            {{-- <div>
              <input data-image="blue" type="radio" id="blue" name="color" value="blue">
              <label for="blue"><span></span></label>
            </div>
            <div>
              <input data-image="black" type="radio" id="black" name="color" value="black">
              <label for="black"><span></span></label>
            </div> --}}
          </div>
        </div>
       @else
        <!-- Cable Configuration -->
        <div class="cable-config">
          <div class="cable-choose">
            <button name="size" value="{{$atribute->id}}">{{$atribute->value}}</button>
          </div>
          @endif
    @endforeach
        </div>
      </div>
    
      <!-- Product Pricing -->
      <br>
      <div class="product-price">
        @foreach ($data as $detail)
        <a href="{{route('cart.add',$detail->id)}}" class="cart-btn">Add to cart</a>
        @endforeach
      </div>
    </div>
  </main>
@endsection
@section('js')
<script>
    $(document).ready(function() {
  
  $('.color-choose input').on('click', function() {
      var headphonesColor = $(this).attr('data-image');
  
      $('.active').removeClass('active');
      $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
      $(this).addClass('active');
  });
  
});
</script>
@stop
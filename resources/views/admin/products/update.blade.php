@extends('admin.layout.layout')
@section('title','Sửa sản phẩm')
@section('content')
<h1 class="text-center">Sửa sản phẩm</h1>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form method="POST" enctype="multipart/form-data" class="col-md-4">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên sản phẩm</span>
        <input type="text" class="form-control" placeholder="Tên sản phẩm:"
         aria-label="Username" aria-describedby="addon-wrapping" name="name">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Giá</span>
        <input type="text" class="form-control" placeholder="Giá sảm phẩm:"
         aria-label="Username" aria-describedby="addon-wrapping" name="price">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Ảnh sản phẩm</span>
        <input type="file" class="form-control" placeholder="Ảnh sản phẩm:"
         aria-label="Username" aria-describedby="addon-wrapping" name="image">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Ảnh liên quan</span>
        <input type="file" class="form-control" placeholder="Ảnh liên quan:"
         aria-label="Username" aria-describedby="addon-wrapping" name="images[]" multiple>
      </div>
      @foreach ($data4 as $item)
         <img src="{{ asset($item->image) }}" alt="" style="width: 100px;">
         @endforeach
      <br><br>
      <div class="form-floating">
        <label for="floatingTextarea">Miêu tả sản phẩm</label>
        <textarea class="form-control" name="des" placeholder="Miêu tả sản phẩm:" id="floatingTextarea"></textarea>
      </div>
      <br>
      <select name="id_type" class="form-select">
        <option value="#" selected>Danh mục</option>
      @foreach ($data1 as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
      </select>
      <br>
      <select name="id_brand" class="form-select">
        <option value="#" selected>Nhà sản xuất</option>
      @foreach ($data2 as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
      @endforeach
      </select>
      <br>
      <div>
        <label>Màu sắc & kích cỡ</label>
        <br><br>
      @foreach ($data3 as $atr)
      @if($atr->id_atrgroup == 1)
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="id_atr[]" id="" value="{{$atr->id}}">&nbsp;<i class="fa-solid fa-brush" style="color: {{$atr->value}}"></i>
      @else
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="id_atr[]" id="" value="{{$atr->id}}">&nbsp;{{$atr->value}}</i>
      @endif
      @endforeach
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Thêm</button>
      </div>
</form>
@endsection
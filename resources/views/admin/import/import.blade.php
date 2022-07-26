@extends('admin.layout.layout')
@section('title','Nhập hàng')
@section('content')
<h1 class="text-center">Nhập hàng</h1>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<table class="import">
    <form method="POST" class="col-md-4">
        @csrf
    <tr>
        <td>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Mã nhập</span>
            <input type="text" class="form-control" placeholder="Mã nhập:"
             aria-label="Username" aria-describedby="addon-wrapping" name="import_code">
          </div>
        </td>
        <td>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Ngày nhập</span>
                <input type="datetime-local" class="form-control" placeholder="Ngày nhập:"
                 aria-label="Username" aria-describedby="addon-wrapping" name="importdate">
              </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Nhà cung cấp</span>
            <input type="text" class="form-control" placeholder="Nhà cung cấp:"
             aria-label="Username" aria-describedby="addon-wrapping" name="supplier">
          </div>
        </td>
        <td>
            <select name="status" class="form-select">
                <option value="#" selected>Tình trạng</option>
                <option value="1">Chưa thanh toán</option>
                <option value="2">Đã thanh toán</option>
              </select>
        </td>
    </tr>
    <tr>
        <td>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Đơn giá</span>
                <input type="text" class="form-control" placeholder="Đơn giá:"
                 aria-label="Username" aria-describedby="addon-wrapping" name="unit_price">
              </div>
        </td>
        <td>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">số lượng</span>
                <input type="text" class="form-control" placeholder="số lượng:"
                 aria-label="Username" aria-describedby="addon-wrapping" name="quantity">
              </div>
        </td>
    </tr>
    <tr>
        <td>
            <select name="id_product" class="form-select">
                <option value="#" selected>Sản phẩm</option>
                @foreach ($data as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
        </td>
        <td>
            <select name="id_admin" class="form-select">
                <option value="#" selected>Người nhập hàng</option>
                @foreach ($data1 as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endforeach
              </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">
            <button type="submit" class="btn btn-primary text-center">Thêm vào kho</button>
        </td>
    </tr>
    </form>
</table>
@endsection
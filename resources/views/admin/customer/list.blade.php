@extends('admin.layout.layout')
@section('title','Tài khoản khách hàng')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<br><br>
<form method="GET" style="width:400px; float:right">
      <div class="input-group mb-3">
  <input name="keyword" type="text" class="form-control" placeholder="Tìm kiếm...">
  <button class="btn btn-success" type="submit" id="button-addon2">Tìm kiếm</button>
</div>
</form>
<div style="clear: both"></div>
<table class="table table-boreder table-hover">
   <theader>
     <tr class="table-primary text-center">
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Hoạt động</th>
        <th colspan="2">Thao tác</th>
     </tr>
     </theader>
     @forelse($data as $item)
        <tr class="text-center">
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->phone}}</td>
          <td>{{$item->address}}</td>
          <td>
            @if ($item->active == 1)
            <a href="{{route('active.cus',$item->id)}}" class="btn btn-success">Đang hoạt động</a>
            @else
            <a href="{{route('active.cus',$item->id)}}" class="btn btn-danger">Đã đóng</a>
            @endif
          </td>
          <td>
          <a href="{{ route('delete.cus',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
          </td>

        </tr>
     @empty
         <tr class="text-center">
             <td colspan="7">Danh sách rỗng</td>
         </tr>
     @endforelse
</table>
{{-- <footer class="text-center">
{{ $data->withQueryString()->links() }}
</footer> --}}
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
 integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
@stop
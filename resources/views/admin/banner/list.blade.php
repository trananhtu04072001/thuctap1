@extends('admin.layout.layout')
@section('title','Quản lí banner')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<a href="{{route('banner.add')}}" class="nav-link">Thêm banner</a>
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
        <th>Tiêu đề</th>
        <th>Ảnh</th>
        <th>Miêu tả</th>
        <th colspan="2">Thao tác</th>
     </tr>
     </theader>
     @forelse($data as $item)
        <tr class="text-center">
          <td>{{$item->id}}</td>
          <td>{{$item->title}}</td>
          <td><img src="{{asset($item->image)}}" alt="" style="width:200px"></td>
          <td>{{$item->des}}</td>
          <td>
          <a href="{{ route('banner.delete',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
          </td>

        </tr>
     @empty
         <tr class="text-center">
          <td colspan="5">Danh sách rỗng</td>
        </tr>
     @endforelse
</table>
<footer class="text-center">
{{ $data->withQueryString()->links() }}
</footer>
@endsection
@section('js')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop

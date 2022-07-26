@extends('admin.layout.layout')
@section('title','Sự kiện sản phẩm')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<a href="{{route('event.add')}}" class="nav-link">Thêm sự kiện sản phẩm</a>
<a href="{{route('add.event')}}" class="nav-link">Thêm sự kiện</a>
{{-- <form method="GET" style="width:400px; float:right">
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
        <th>Sự kiện</th>
        <th>sản phẩm áp dụng</th>
        <th>Triết khấu</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Trạng thái</th>
        <th colspan="2">Thao tác</th>
     </tr>
     </theader>
     @forelse($data as $item)
        <tr class="text-center">
          <td>{{$item->id}}</td>
          <td>{{$item->event}}</td>
          <td>{{$item->product}}</td>
          <td>{{$item->discount}} %</td>
          <td>{{date('d-m-Y',strtotime($item->start))}}</td>
          <td>{{date('d-m-Y',strtotime($item->end))}}</td>
          <td>
                @if ($item->status == 1)
                <a href="" class="btn btn-success">Đang áp dụng</a>
                @else
                <a href="" class="btn btn-danger">Đã đóng</a>
                @endif
            </td>
          <td>
          <a href="{{ route('destroy.event',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
          </td>

        </tr>
     @empty
         <tr class="text-center">
          <td colspan="8">Danh sách rỗng</td>
        </tr>
     @endforelse
</table> --}}
<div class="card-body">
  <table id="datatablesevent" class="text-center">
      <thead>
          <tr>
        <th>ID</th>
        <th>Sự kiện</th>
        <th>sản phẩm áp dụng</th>
        <th>Triết khấu</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Trạng thái</th>
        <th colspan="2">Thao tác</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $item)
        <tr class="text-center">
          <td>{{$item->id}}</td>
          <td>{{$item->event->name}}</td>
          <td>{{$item->product->name}}</td>
          <td>{{$item->discount}} %</td>
          <td>{{date('d-m-Y',strtotime($item->start))}}</td>
          <td>{{date('d-m-Y',strtotime($item->end))}}</td>
          <td>
                @if ($item->status == 1)
                <a href="" class="btn btn-success">Đang áp dụng</a>
                @else
                <a href="" class="btn btn-danger">Đã đóng</a>
                @endif
            </td>
          <td>
          <a href="{{ route('destroy.event',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
          </td>

        </tr>
     @empty
         <tr class="text-center">
          <td colspan="8">Danh sách rỗng</td>
        </tr>
     @endforelse
      </tbody>
  </table>
</div>
@endsection
@section('js')
<script>
  window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesevent');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop

@extends('admin.layout.layout')
@section('title','Đơn hàng')
@section('css')
@stop
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<div class="card-body">
  <table id="datatablesorder" class="text-center">
      <thead>
          <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Số lượng</th>
              <th>Tổng tiền</th>
              <th>Ghi chú</th>
              <th>Tình trạng</th>
              <th colspan="2">Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($data as $order)
          <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->users->name}}</td>
              <td>{{$order->quantity}} sản phẩm</td>
              <td>{{number_format($order->total, 0, ',', '.')}} VND</td>
              <td>{{$order->des}}</td>
              <td>
                @if ($order->status == 0)
                <a href="{{route('admin.order.status',$order->id)}}" class="btn btn-danger">Đơn hàng đã huỷ</a>
                @endif
                @if ($order->status == 1)
                <a href="{{route('admin.order.status',$order->id)}}" class="btn btn-warning">xác nhận</a>
                @endif
                @if ($order->status == 2)
                <a href="{{route('admin.order.status',$order->id)}}" class="btn btn-secondary">Đã xác nhận</a>
                @endif
                @if ($order->status == 3)
                <a href="{{route('admin.order.status',$order->id)}}" class="btn btn-secondary">Đang chuẩn bị hàng</a>
                @endif
                @if ($order->status == 4)
                <a href="{{route('admin.order.status',$order->id)}}" class="btn btn-secondary">Đã giao cho dvvc</a>
                @endif
                @if ($order->status == 5)
                <a href="#" class="btn btn-secondary">Xác nhận đã nhận hàng</a>
                @endif
                @if ($order->status == 6)
                <a href="#" class="btn btn-success">Đơn hàng thành công</a>
                @endif
                {{-- @if ($order->status == 7)
                <a href="#" class="btn btn-success">Đơn hàng thành công</a>
                @endif --}}
              </td>
                <td>
                  <a href="{{ route('admin.detail_order',$order->id)}}"><button class="btn btn-primary">Chi tiết</button></a>
                </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">Danh sách rỗng</td>
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

    const datatablesSimple = document.getElementById('datatablesorder');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop
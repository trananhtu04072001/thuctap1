@extends('admin.layout.layout')
@section('title','Lịch sử nhập hàng')
@section('css')
@stop
@section('content')
<br>
<div class="card-body">
  <table id="datatablesimport" class="text-center">
      <thead>
          <tr>
              <th>ID</th>
              <th>Mã nhập</th>
              <th>Người nhập</th>
              <th>Trạng thái</th>
              <th colspan="2">Thao tác</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($data as $item)
          <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->code_import}}</td>
              <td>{{$item->admin->name}}</td>
              <td>
                @if ($item->status == 2)
                <a href="{{ route('admin.import.status', $item->id) }}" class="btn btn-success">Đã thanh toán</a>
                @else
                <a href="{{ route('admin.import.status', $item->id)}}" class="btn btn-danger">Chưa thanh toán</a>
                @endif
            </td>
                <td>
                  <a href="{{ route('admin.import.detail',$item->id)}}"><button class="btn btn-primary">chi tiết</button></a>
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

    const datatablesSimple = document.getElementById('datatablesimport');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop

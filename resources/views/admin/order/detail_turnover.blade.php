@extends('admin.layout.layout')
@section('title','Doanh thu chi tiết')
@section('css')
@stop
@section('content')
<br>
<div class="card-body">
  <table id="datatablesorder" class="text-center">
      <thead class="text">
          <tr>
              <th>Ngày</th>
              <th>Số đơn hàng</th>
              <th>Doanh thu</th>
              <th colspan="2">Chi tiết</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($order as $data)
          <tr>
              <td>Tháng {{$data->month}}</td>
              <td>{{$data->count}} Đơn hàng/Tháng</td>
              <td>{{number_format($data->total, 0, ',', '.')}} VND</td>
              <td>
              <a href=""><button class="btn btn-primary">Chi tiết</button></a>
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
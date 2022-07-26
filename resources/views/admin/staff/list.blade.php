@extends('admin.layout.layout')
@section('title','Quản lí nhân sự')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
    <a href="{{route('admin.regis')}}" class="nav-link">Thêm tài khoản</a>
<br>
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Danh sách Nhân viên:
  </div>
  <div class="card-body">
      <table id="datatablestaff" class="text-center">
          <thead>
              <tr>
                  <th>Tên</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Chức vụ</th>
                  <th>Hoạt động</th>
                  <th>Thao tác</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($data as $item)
              <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->level->name}}</td>
                  <td> @if ($item->active == 1)
                      <a href="#" class="btn btn-success">Đang hoạt động</a>
                      @else
                      <a href="#" class="btn btn-danger">Đã đóng</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('staff.delete',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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
</div>
@endsection
@section('js')
<script>
  window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablestaff');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop
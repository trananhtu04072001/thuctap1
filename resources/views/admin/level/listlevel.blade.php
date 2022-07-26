@extends('admin.layout.layout')
@section('title','Quản lí phòng ban')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
    <a href="{{route('admin.addlevel')}}" class="nav-link">Thêm chức vụ</a>
<br>
<div class="card mb-4">
   <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Danh sách khách hàng:
   </div>
   <div class="card-body">
       <table id="datatableslevel" class="text-center">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Chức vụ</th>
                   <th>Thao tác</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($data as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->name}}</td>
                   <td>
                      <a href="{{ route('admin.destroylevel',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
                     </td>
               </tr>
               @endforeach
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

    const datatablesSimple = document.getElementById('datatableslevel');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop
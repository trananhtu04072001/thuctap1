@extends('admin.layout.layout')
@section('title','Quản lí hãng')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
@stop
@section('content')
<a href="{{route('brand.add')}}" class="nav-link">Thêm hãng</a>
<br>
<div class="card-body">
   <table id="datatablesbrand" class="text-center">
       <thead>
           <tr>
               <th>ID</th>
               <th>Tên</th>
               <th>Thao tác</th>
           </tr>
       </thead>
       <tbody>
           @forelse ($data as $item)
           <tr>
               <td>{{$item->id}}</td>
               <td>{{$item->name}}</td>
                 <td>
                   <a href="{{ route('brand.destroy',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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

    const datatablesSimple = document.getElementById('datatablesbrand');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop

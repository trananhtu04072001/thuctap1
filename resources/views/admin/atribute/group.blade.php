@extends('admin.layout.layout')
@section('title','Nhóm thuộc tính')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
    <a href="{{route('atribute.addgroup')}}" class="nav-link">Thêm nhóm thuộc tính</a>
<br>
<div class="card-body">
   <table id="datatablesatrgroup" class="text-center">
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
                   <a href="{{ route('atributegro.destroy',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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
 
     const datatablesSimple = document.getElementById('datatablesatrgroup');
     if (datatablesSimple) {
         new simpleDatatables.DataTable(datatablesSimple);
     }
 });
 </script>
@stop
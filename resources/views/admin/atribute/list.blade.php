@extends('admin.layout.layout')
@section('title','Quản lí thuộc tính')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
    <a href="{{route('atribute.add')}}" class="nav-link">Thêm thuộc tính</a>
<br>
<div class="card-body">
   <table id="datatablesatr" class="text-center">
       <thead>
           <tr>
               <th>ID</th>
               <th>Tên</th>
               <th>Giá trị</th>
               <th>Thao tác</th>
           </tr>
       </thead>
       <tbody>
           @forelse ($data as $item)
           <tr>
               <td>{{$item->id}}</td>
               <td>{{$item->atrgroup->name}}</td>
               <td>
                  @if($item->id_atrgroup == 1)
                  <i class="fa-solid fa-brush" style="color: {{$item->value}}"></i>
                  @else 
                     <span>{{$item->value}}</span>
                  @endif
               </td>
                 <td>
                   <a href="{{ route('atribute.destroy',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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
 
     const datatablesSimple = document.getElementById('datatablesatr');
     if (datatablesSimple) {
         new simpleDatatables.DataTable(datatablesSimple);
     }
 });
 </script>
@stop
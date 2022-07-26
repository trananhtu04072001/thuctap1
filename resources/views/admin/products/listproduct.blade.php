@extends('admin.layout.layout')
@section('title','Danh sách sản phẩm')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<style>
   #image {
      width: 10px !important;
      height: 30px !important;
   }
</style>
@stop
@section('content')
    <a href="{{route('product.add')}}" class="nav-link">Thêm sản phẩm</a>
<br>
<div class="card-body">
   <table id="datatablespro" class="text-center">
       <thead>
           <tr>
               <th>ID</th>
               <th>Tên</th>
               <th>Tình trạng</th>
               <th>Thao tác</th>
           </tr>
       </thead>
       <tbody>
           @forelse ($data as $item)
           <tr>
               <td>{{$item->id}}</td>
               <td>
                  <img src="{{ asset($item->image) }}" alt="{{ $item->name}}" style="width:100px;"><br>{{$item->name}}
               </td>
               <td>
                @if ($item->status == 1)
                <a href="" class="btn btn-success">Còn hàng</a>
                @else
                <a href="" class="btn btn-danger">Hết hàng</a>
                @endif
               </td>
                 <td>
                  <a href="{{ route('product.detail',$item->id)}}"><button class="btn btn-primary">chi tiết</button></a>
                  <a href="{{ route('product.update',$item->id)}}"><button class="btn btn-primary">Sửa</button></a>
                  <a href="{{ route('product.destroy',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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
 
     const datatablesSimple = document.getElementById('datatablespro');
     if (datatablesSimple) {
         new simpleDatatables.DataTable(datatablesSimple);
     }
 });
 </script>
@stop
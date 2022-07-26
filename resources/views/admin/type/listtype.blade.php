@extends('admin.layout.layout')
@section('title','Quản lí loại')
@section('content')
    <a href="{{route('type.add')}}" class="nav-link">Thêm loại</a>
<br>
<div class="card-body">
   <table id="datatablestype" class="text-center">
       <thead>
           <tr>
               <th>ID</th>
               <th>Tên</th>
               <th>Thao tác</th>
           </tr>
       </thead>
       <tbody>
           @forelse ($data1 as $item)
           <tr>
               <td>{{$item->id}}</td>
               <td>{{$item->name}}</td>
                 <td>
                   <a href="{{ route('destroy.type',$item->id)}}"><button class="btn btn-primary">Xoá</button></a>
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

    const datatablesSimple = document.getElementById('datatablestype');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
@stop

@extends('admin.layout.layout')
@section('title','Sản phẩm trong kho')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card-body">
    <table id="datatablespro" class="text-center">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Số lượng nhập</th>
                <th>Số lượng bán</th>
                <th>Sl trong kho</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data1 as $item)
            <tr>
                <td>{{$item->product->name}}</td>
                <td>{{$item->sum}} SP</td>
            @foreach ($data2 as $val)
            @if($item->product->id == $val->product->id)
                <td>Đã bán: {{$val->sum}} SP</td>
                <td>Còn lại : {{($item->sum)-($val->sum) }} SP</td>
                <td>
                    @if ($val->product->status == 1)
                    <a href="{{route('admin.import.update',$val->product->id)}}" class="btn btn-success">Còn hàng</a>
                    @else
                    <a href="{{route('admin.import.update',$val->product->id)}}" class="btn btn-danger">Hết hàng</a>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
            @endforeach
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
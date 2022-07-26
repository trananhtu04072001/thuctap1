@extends('admin.layout.layout')
@section('title','Thêm nhóm thuộc tính')
@section('content')
<h1 class="text-center">Thêm nhóm thuộc tính</h1>
<form method="POST" class="groupform">
    @csrf
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Nhóm thuộc tính</span>
        <input type="text" class="form-control" placeholder="Thêm thuộc tính:"
         aria-label="Username" aria-describedby="addon-wrapping" name="name" id="inputName">
      </div>
      <br>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center">Thêm</button>
      </div>
</form>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
    $('#inputName').change(function(event){
        alert("ok");
    });
 </script>
@stop
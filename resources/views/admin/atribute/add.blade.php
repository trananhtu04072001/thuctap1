@extends('admin.layout.layout')
@section('title','Thêm thuộc tính')
@section('content')
<h1 class="text-center">Thêm thuộc tính</h1>
<form method="POST" class="atrform">
    @csrf
    <select class="form-select" aria-label="Default select example" id="inputName" name="id_atrgroup">
      <option selected>Thuộc tính</option>
      @foreach ($atr as  $value)
      <option value="{{ $value->id}}">{{ $value->name}}</option>
      @endforeach
    </select>
      <br>
      <div class="input-group flex-nowrap" id="text">
        <span class="input-group-text" id="addon-wrapping">Giá trị</span>
        <input type="text" class="form-control" placeholder="Giá trị:"
         aria-label="Username" aria-describedby="addon-wrapping" name="value">
      </div>
      <br>
      <div class="input-group flex-nowrap" id="color">
        <span class="input-group-text" id="addon-wrapping">Giá trị</span>
        <input type="color" class="form-control" placeholder="Thêm thuộc tính:"
         aria-label="Username" aria-describedby="addon-wrapping" name="color">
      </div>
      <div class="text-center">
      <button type="submit" class="btn btn-primary text-center" id="btn1">Thêm</button>
      </div>
</form>
@endsection
@section('js')
{{-- <script language="javascript">
  document.getElementById("inputName").onclick = function () {
    alert('hello');
              if(document.getElementById("inputName") == 1){
                document.getElementById("text").style.display = 'none';
            }
            if(document.getElementById("inputName") == 2){
              document.getElementById("color").style.display = 'block';
            }
            };
</script> --}}
@stop
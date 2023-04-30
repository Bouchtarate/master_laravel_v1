@extends('layouts.master')
@section('content')
<form method="POST" enctype="multipart/form-data">
  @csrf
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
    @error('name')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  </div>
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  @error('email')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  <div class="my-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone">
  </div>
  @error('phone')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  <div class="my-3">
    <label for="salary" class="form-label">Budget</label>
    <input type="text" class="form-control" name="budget">
  </div>
  <div class="my-3">
    <label for="image" class="form-label">Avatar</label>
    <input type="file" class="form-control" name="images">
  </div>
  @error('budget')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
    <div class="d-grid col-4 mx-auto">
      <button id="addClient" class="btn btn-outline-dark">Add Client</button>
    </div>
</form>
@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
      $(document).on('click','#addClient',function(e){
        e.preventDefault();
        $.ajax({
          type:"POST",
          url: "{{route('ajaxCRUD.store')}}",
          data:{
            '_token':"{{csrf_token()}}",
            'name':$("input[name='name']").val(),
            'email':$("input[name='email']").val(),
            'phone':$("input[name='phone']").val(),
            'budget':$("input[name='budget']").val(),
            // 'images':$("input[name='images']").val(),
          },
          success:function(data){

          },error:function(data){

          }
        });
      });
    });
  </script>
@endsection

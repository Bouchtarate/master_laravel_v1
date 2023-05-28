@extends('layouts.master')
@section('title','Modify Client')
@section('content')
<form method="POST" id="editClient">
  @csrf
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$client->name}}">
    <input type="text" class="form-control" name="id" value="{{$client->id}}" style="display: none;">
  </div>
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{$client->email}}">
  </div>
  <div class="my-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
  </div>
  <div class="my-3">
    <label for="salary" class="form-label">Budget</label>
    <input type="text" class="form-control" name="budget" value="{{$client->budget}}">
  </div>
  <div class="d-grid col-4 mx-auto">
    <button id="updateClient" class="btn btn-outline-info">Edit Client</button>
  </div>
  <div class="alert alert-info text-center m-3" id ="success_msg" style="display: none">
    تم التغير بنجاح
  </div>
</form>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click','#updateClient',function(e){
      e.preventDefault();
      var formData=new FormData($('#editClient')[0]);
      $.ajax({
        type:"POST",
        url:"{{route('ajaxCRUD.update')}}",
        data:formData,
        processData: false,
        contentType:false,
        cache:false,
        success:function(data){
          if(data.status ===true){
            console.log(data.msg);
            $('#success_msg').show();
          }
        },error:function(data){

        }
      });
    });
  });
</script>
@endsection

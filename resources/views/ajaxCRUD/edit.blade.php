@extends('layouts.master')
@section('title','Modify Client')
@section('content')
<form action="{{route('ajaxCRUD.update',$client->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$client->name}}">
    @error('name')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  </div>
  <div class="my-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{$client->email}}">
  </div>
  @error('email')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  <div class="my-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
  </div>
  @error('phone')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
    @enderror
  <div class="my-3">
    <label for="salary" class="form-label">Budget</label>
    <input type="text" class="form-control" name="budget" value="{{$client->budget}}">
  </div>
  @error('budget')
    <div class="text-danger mt-3 text-center">{{$message}}</div>
  @enderror
  <div class="d-grid col-4 mx-auto">
    <button id="editClient" class="btn btn-outline-info">Edit Client</button>
  </div>
</form>

</form>
@endsection

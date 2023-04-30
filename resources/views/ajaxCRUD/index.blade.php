@extends('layouts.master')
@section('title','مرحبا')
@section('content')
<table class="table my-3">
  <thead>
    <tr>
      <th scope="col">Avatar</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">budget</th>
      <th scope="col">Modify</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)
    <tr class="clientRow{{$client->id}}">
      <th style="width: 100px">
        @if ($client->images)
        <img src="{{asset('images/clients/'.$client->images)}}" alt="{{$client->name}}" class="w-25">
        @endif
      </th>
      <th>{{$client->name}}</th>
      <th>{{$client->email}}</th>
      <th>{{$client->phone}}</th>
      <th>{{$client->budget}}</th>
      <th><a href="{{url('ajax/edit/'.$client->id)}}"class="btn btn-outline-success">Edit {{$client->id}}</a></th>
      <th><a href="" clientId="{{$client->id}}"  class="btn btn-outline-danger deleteClient">Delete {{$client->id}}</a></th>
    </tr>
    @endforeach
    @if (Session::has('success'))
    <div class="alert alert-primary text-center" role="alert">
      {{ Session::get('success')}}
    </div>
    @endif
  </tbody>
</table>
<div class="d-grid col-4 mx-auto">
  <a href="/ajax/create" class="nav-link btn btn-outline-warning p-3 mt-3">create user</a>
  {{-- THE LANGUE USED --}}
  {{-- <p>{{$lang}}</p> --}}
</div>
<div class="alert alert-info text-center m-3" id ="success_msg" style="display: none">
  تم الحدف بنجاح
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click','.deleteClient',function(e){
      var clientId = $(this).attr('clientId');
      e.preventDefault();
      $.ajax({
        type:"POST",
        url:"{{route('ajaxCRUD.delete')}}",
        data:{
          '_token':"{{csrf_token()}}",
          'id':clientId,
        },
        success:function(data){
          $('#success_msg').show();
          $('.clientRow'+data.id).remove();
        },error:function(data){

        },
      });
    });
  });
</script>
@endsection

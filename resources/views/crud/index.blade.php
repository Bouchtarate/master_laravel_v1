<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>CRUD</title>
</head>
<body>
  <div class="container">
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
      <tr>
        <th style="width: 100px">
          @if ($client->images)
          <img src="{{asset('images/clients/'.$client->images)}}" alt="{{$client->name}}" class="w-25">
          @endif
        </th>
        <th>{{$client->name}}</th>
        <th>{{$client->email}}</th>
        <th>{{$client->phone}}</th>
        <th>{{$client->budget}}</th>
        <th><a href="{{url('edit/'.$client->id)}}"class="btn btn-outline-success">Edit {{$client->id}}</a></th>
        <th><a href="{{route('crud.delete',$client->id)}}"class="btn btn-outline-danger">Delete {{$client->id}}</a></th>
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
    <p>{{$lang}}</p>
  </div>
</div>
</body>
</html>

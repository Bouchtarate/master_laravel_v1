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
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">budget</th>
        <th scope="col">Avatar</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
      <tr>
        <th>{{$client->id}}</th>
        <th>{{$client->name}}</th>
        <th>{{$client->email}}</th>
        <th>{{$client->phone}}</th>
        <th>{{$client->budget}}</th>
        <th class="w-25"> <img src="{{asset('images/clients/'.$client->images)}}" alt="{{$client->name}}" class="w-25"></th>
      </tr>
      @endforeach
      @if (Session::has('success'))
      <div class="alert alert-primary" role="alert">
        {{ Session::get('success')}}
      </div>
      @endif
    </tbody>
  </table>
  <div class="d-grid col-4 mx-auto">
    <a href="/create" class="nav-link text-center text-success btn btn-outline-warning p-3 mt-3">create user</a>
    {{-- THE LANGUE USED --}}
    <p>{{$lang}}</p>
  </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Front Section</title>
</head>
<body>
  @extends('layouts.master')
  @section('content')
  <h1>Front {{$id}}</h1>
  <h1>Front {{$name}}</h1>
  <h1>Front {{$age}}</h1>
  <h1>Front {{$email}}</h1>

  @endsection

</body>
</html>

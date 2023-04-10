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


  <form action="{{route('crud.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email">
    </div>
    @error('email')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" class="form-control" name="phone">
    </div>
    @error('phone')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    <div class="mb-3">
      <label for="salary" class="form-label">Budget</label>
      <input type="text" class="form-control" name="budget">
    </div>
    @error('budget')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>

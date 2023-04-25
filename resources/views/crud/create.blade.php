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


  <form action="{{route('crud.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="my-3">
      <label for="image" class="form-label">Avatar</label>
      <input type="file" name="images" id="images" class="form-control">
      @error('image')
      <div class="text-danger mt-3 text-center">{{$message}}</div>
      @enderror
    </div>

    <div class="my-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
      @error('name')
      <div class="text-danger mt-3 text-center">{{$message}}</div>
      @enderror
    </div>
    <div class="my-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
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
    @error('budget')
      <div class="text-danger mt-3 text-center">{{$message}}</div>
      @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>

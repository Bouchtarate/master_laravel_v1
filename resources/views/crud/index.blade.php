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
  <table>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>
            {{$user->name}}
          </td>
          <td>
            {{$user->email}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href="/create">create user</a>
</body>
</html>

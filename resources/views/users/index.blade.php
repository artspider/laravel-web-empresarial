<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>Hola desde la vista Users-index</h1>
  @foreach ($users as $key => $user)
  <span>{{ $key }}.- {{ $user->name }} - </span>
  <span> {{ $user->email }} </span>
  <br>
  @endforeach
</body>

</html>
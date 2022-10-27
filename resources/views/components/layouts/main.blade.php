<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <div>El header del usuario registrado va aqui</div>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
      Logout
    </a>
  </form>

  <div>
    {{ $slot }}
  </div>
</body>

</html>
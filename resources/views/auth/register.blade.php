<x-layouts.guest>
  <h1>En el auth-register</h1>

  @if ($errors->any())
  <div>
    <h3>Ha ocurrido un error</h3>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/register" method="post">
    @csrf
    <div>
      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" value="{{ old('name')}}" autofocus>
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email')}}">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="{{ old('password') }}">
    </div>
    <div>
      <label for="password_confirmation">Confirmar Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation"
        value="{{ old('password_confirmation') }}">
    </div>

    <div>
      <button type="submit">Registrar</button>
    </div>

  </form>

</x-layouts.guest>
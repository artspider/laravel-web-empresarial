<x-layouts.guest>
  <h1>En el auth-login</h1>
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
  <form action="/login" method="post">
    @csrf

    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email')}}">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="{{ old('password') }}">
    </div>


    <div>
      <button type="submit">Login</button>
    </div>

  </form>
</x-layouts.guest>
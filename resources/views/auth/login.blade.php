<x-layouts.guest>
  @if ($errors->any())
  <div class="errors">

    <ul>
      @foreach ($errors->all() as $error)
      <x-utils.flash type="danger">{{$error}}</x-utils.flash>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="auth-card">
    <div class="auth-card__login">
      <div class="login-wrapper">
        <div class="auth-card__logo center">
          <img class="mb-4" src="../images/logo_nobg.png" alt="" srcset="">
        </div>
        <p class="text-base">WELCOME TO</p>
        <x-utils.subtitle>FIGO´S RESTAURANTE</x-utils.subtitle>
        <p class="text-sm login-text font-ligth mt-3 ">Log in to get dashboard admin panel</p>
        <div class="auth-card__form mt-5">
          <form action="/login" method="post" autocomplete="off">
            @csrf
            <div class="auth-card__email mb-4">
              <input type="email" id="email" name="email" value="{{ old('email')}}" autofocus>
              <x-icons.user class="icon-user" />
            </div>
            <div class="auth-card__password mb-4">
              <input type="password" id="password" name="password" value="{{ old('password') }}">
              <x-icons.password class="icon-password" />
            </div>
            <div class="auth-card__button ">
              <button class="cursor-pointer" type="submit">Login</button>
            </div>
          </form>
        </div>
        <p class="text-sm login-text mt-3 ">
          Don't have an account?<a href="{{ route('register') }}" class="auth-card__signup font-semibold"> Sign Up
            now</a>
        </p>
      </div>
    </div>
    <div class="auth-card__banner">
      <div class="auth-card__container">
        <img class="mb-4" src="../images/logo_nobg.png" alt="" srcset="" width="140">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, ut ab commodi culpa natus quas id ex,
          adipisci eveniet suscipit pariatur dolores non blanditiis accusantium aperiam, dolore veritatis odit fugit
          maiores exercitationem minima delectus animi. Ipsam tempora facere, dolore quia et quas totam earum, illo
          possimus aperiam suscipit nam harum!</p>
      </div>
    </div>
  </div>
</x-layouts.guest>
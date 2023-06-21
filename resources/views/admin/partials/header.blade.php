<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark h-100">
    <div class="container-fluid h-100">
      <a class="navbar-brand d-flex align-items-center h-100 p-0 m-0" href="{{ route('admin.home') }}">
        <img src="{{ Vite::asset('/resources/img/logo-ms.png') }}" alt="">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">
          @auth
            <li class="nav-item text-uppercase">
              <a class="nav-link" href="{{ route('home') }}">Vai al sito</a>
            </li>
          @endauth
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item text-uppercase">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item text-uppercase">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn nav-link text-uppercase">Logout</button>
              </form>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
</header>

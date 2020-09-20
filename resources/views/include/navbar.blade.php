{{-- <nav class="navbar sticky-top navbar-dark bg-secondary rounded-bottom">
    <a class="navbar-brand" href="/posts">Blog 2020</a>
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="/user">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/posts/create">Create</a>
        </li>
      </ul>
</nav>  --}}


{{--  --}}
<nav class="navbar navbar-expand-md navbar-dark bg-secondary p-2 sticky-top rounded-bottom">
      <a class="navbar-brand" href="{{ url('/posts') }}">
          {{ config('app.name', 'Blog 2020') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/posts/create">Create</a>
                          <a class="dropdown-item" href="/home">Dashboard</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
</nav>
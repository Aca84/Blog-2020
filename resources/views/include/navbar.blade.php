<nav class="navbar navbar-expand-md navbar-dark bg-info p-2 sticky-top rounded-bottom shadow">
    <a class="navbar-brand font-italic ml-2" href="{{ url('/posts') }}">
        <h3>{{ config('app.name', 'Blog 2020') }}</h3>
    </a>

    {{-- Dropdown for user meni --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            {{-- Search form  --}}
            <form class="form-inline my-2 my-lg-0 justify-content-end mr-3" method="GET" action="{{ route('search') }}">
                @csrf
                <input class="nav-src form-control mr-sm-2" type="search" placeholder="Search" name="search" id="query">
                <button class="btn my-1 my-sm-0" type="submit" data-container="body" data-toggle="popover" data-placement="right" data-content="Type something!">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                {{-- Dropdown for loged user --}}
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/posts/create">Create</a>
                    <a class="dropdown-item" href="/home">Dashboard</a>
                    {{-- Check if is logged user admin --}}
                    @if (Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="/admin">Admin Posts</a>
                        <a class="dropdown-item" href="/user">Admin Users</a>
                    @endif
                    {{-- Logout --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
<script src="{{ asset('/js/main.js') }}"></script>

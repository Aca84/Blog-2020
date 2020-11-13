<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Blog') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-pro/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('sass/custom.scss') }}" rel="stylesheet"> --}}
</head>

<body>
    <div class="btn btn-dark mb-3 mr-3" onclick="goToTop()" id="onTop">UP</div>
    <div id="app">
        <div class="container">
            @include('include/navbar')
            {{-- buttons for changing theme to dark/light --}}
            {{-- <button class="btn btn-dark mt-3" id="button">Dark</button>
            <button class="btn btn-light mt-3" id="button1">Light</button> --}}
            {{-- @include('include/sidebar') --}}
            <div class="msgs">
                @include('include/messages')
            </div>
            <main class="container rounded shadow py-2 my-3" style='min-height: 800px'>
                {{-- @include('include/messages') --}}
                @yield('content')
                {{-- <div class="text-center">
                    {{-- @include('include/messages') 
                </div> --}}
            </main>
            
            @include('include/footer')
        </div>
    </div>
    {{-- <script src="{{ asset('/js/main.js') }}"></script> --}}
    
</body>
    {{-- <script src="{{ asset('/js/main.js') }}"></script> --}}
</html>
    <script src="{{ asset('/js/main.js') }}"></script>


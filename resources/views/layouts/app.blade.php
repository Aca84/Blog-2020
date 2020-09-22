<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <div id="app">     
        <div class="container">
            @include('include/navbar')
            {{-- @include('include/sidebar') --}}
            <main class="container-fluid rounded shadow py-2 my-3" style='min-height: 660px'>
                @yield('content')
                    <div class="text-center">
                        @include('include/messages')
                    </div>           
            </main>
            @include('include/footer')
        </div>
    </div>
</body>
</html>

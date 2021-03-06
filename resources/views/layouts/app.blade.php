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
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
</head>

<body>
{{-- button for return on top of page --}}
<div onclick="goToTop()" id="onTop">
    <i class="fas fa-hand-point-up"></i>
</div>

    <div id="app">  
        <div class="container">
            @include('include/navbar')
                {{-- Error  messages --}}
                <div class="msgs">
                    @include('include/messages')
                </div>
                <main class="container rounded shadow py-2 my-3" style='min-height: 800px'>
                    @yield('content')
                </main>
            @include('include/footer')
        </div>
    </div>
    {{-- Js file import --}}
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>


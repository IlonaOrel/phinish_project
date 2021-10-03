<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title-block')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            margin:0px;
            padding:0px;
            height:100%;

        }
        body {
            font-family: 'Lato';

        }

        footer{
            background-color: #B0BEC5;
            position: relative;
            height: 27px;
            width: 100%;
            bottom: 0px;
            z-index: 1;
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.header')
        @if(Request::is('/'))
            @include('inc.hidden')
        @endif
        <main class="py-4">
            <div class="row justify-content-md-center">
                <div class="col col-md-2">
                    @guest
                        @include('inc.acide')
                    @else
                        @include('inc.acideDoctor')
                    @endguest
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </main>
        @include('inc.footer')
    </div>
</body>
</html>

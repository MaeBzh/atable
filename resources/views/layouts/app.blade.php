<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'A Table !') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include("layouts.nav")

    <main>
        @if (session()->has('success'))
            <div class="green darken-3 white-text text-center" id="popup_notification">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="red darken-3 white-text text-center" id="popup_notification">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
    @include("layouts.footer")
</div>

</body>
</html>

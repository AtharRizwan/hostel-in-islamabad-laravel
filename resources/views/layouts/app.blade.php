<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        @vite(['resources/css/styles.css', 'resources/css/about.css', 'resources/css/services.css', 'resources/css/product_x.css',
        'resources/css/reviews.css', 'resources/css/login.css']) <!-- 'resources/js/script.js', 'resources/js/reviews.js']) -->
    </head>
    <body>
        @include('partials.header')
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>

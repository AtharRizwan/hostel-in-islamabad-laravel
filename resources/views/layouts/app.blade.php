<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Hostel in Islamabad')</title>
        <meta name="description" content="@yield('description', 'A cozy hostel in Islamabad with fresh breakfast, nightly hot chocolate pudding, bike hire and free pick-up and drop-off.')">
        <link rel="icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:ital,wght@0,600;0,700;1,600;1,700&display=swap">

        <!-- Shared styles, then the page's own stylesheet -->
        @vite(['resources/css/base.css', 'resources/css/components.css', 'resources/css/app.css'])
        @stack('styles')

        <!-- Applies the saved theme before the page renders -->
        <script src="{{ asset('js/theme.js') }}"></script>
    </head>
    <body>
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
        @include('partials.flash')

        <script src="{{ asset('js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>

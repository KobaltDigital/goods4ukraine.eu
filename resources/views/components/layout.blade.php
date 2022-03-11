<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>
            {{ config('app.name') }}
        </title>
    </head>
    <body class="antialiased">
        <x-nav>
            
        </x-nav>
        @yield('content')
    </body>
</html>
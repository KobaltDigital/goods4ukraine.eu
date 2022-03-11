<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>
        <title>
            {{ config('app.title') }}
        </title>
    </head>
    <body class="antialiased bg-gray-100">
        <x-nav />
        {{ $slot }}

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

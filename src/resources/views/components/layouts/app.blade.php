<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name=”robots” content=”index, follow”>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name=”description”
              content=”This is a meta description sample. We can add up to 160 characters.”>

        <title>{{ config('app.name', '131 Studios') }}</title>

        <link rel=”canonical” href=”{{config('app.url')}}” />

        <!-- Fonts -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
    </head>
    <body>
        <!-- Scripts -->
        @livewireScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>

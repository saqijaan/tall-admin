<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" /> --}}
    <!-- Scripts -->
    @vite(['resources/css/admin/app.css'])
    @stack('css')
    @livewireStyles
</head>

<body x-data="tallTheme()" :class="{ 'dark': dark && false }" x-init="dark = getThemeFromLocalStorage()">

    @auth
        @include('admin.layouts.auth-partial')
    @endauth

    @guest
        @include('admin.layouts.guest-partial')
    @endguest

    <x-notify-component />

    @livewireScriptConfig
    @stack('pre_alpine_js')
    @vite('resources/js/admin/app.js')
    @stack('js')
</body>

</html>

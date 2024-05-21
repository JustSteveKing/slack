@props(['title' => config('app.name')])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 dark:bg-slate-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
    @filamentStyles
    <style>[x-cloak] {display: none !important;}</style>
</head>
<body {!! $attributes->merge(['class' => 'font-sans antialiased h-screen text-slate-900 dark:text-slate-50']) !!}>
    {{ $slot }}

    @filamentScripts
    @stack('scripts')
</body>
</html>

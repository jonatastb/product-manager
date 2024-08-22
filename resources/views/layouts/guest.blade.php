<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-row items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full bg-indigo-500 h-screen flex justify-center items-center shadow-2xl shadow-">
                <h1 class="text-7xl text-center font-extrabold text-white">
                    Gerenciador <br> de <br> Produtos
                </h1>
            </div>
            <div class="w-1/2 px-8 flex items-center justify-center">
                <div class="w-1/2 mt-6 px-6 py-4 bg-white shadow-md sm:rounded-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

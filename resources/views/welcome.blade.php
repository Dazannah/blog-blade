<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="sm:justify-center sm:items-center min-h-screen bg-darker bg-center bg-gray-100 dark:bg-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @include('layouts.guestNavigation')
            <div class="font-semibold text-gray-600 dark:text-gray-400 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                Welcome to "My blog", feel free to register and try out the site with a new account, or try it with teszt/Teszt1234.
            </div>

            <div class="text-gray-600 dark:text-gray-400 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                Last 10 new blog posts:
            </div>

            @include('components.posts')
        </div>
    </body>
</html>

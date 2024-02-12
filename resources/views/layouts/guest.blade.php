<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-black-color">
    @include('layouts.navigation')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-main-color shadow md:z-40">
            <div class="p-6 mx-auto text-xl font-semibold leading-tight text-white-color">
                {{ $header }}
            </div>
        </header>
    @endif

    <div class="flex flex-col items-center min-h-screen pt-6 bg-bkg-color sm:justify-center sm:pt-0">
        <!-- Page Content -->
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white-color shadow-md sm:max-w-md sm:rounded-xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>

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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 flex flex-col">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex md:flex-row md:flex-wrap px-3 mx-3 flex-1 pt-0">
                <div class="pt-3 w-full md:w-1/6 lg:w-1/6 py-4 p-2 border-r-4 border-gray-200 pt-5">
                    @livewire('nav-menu')
                </div>
                <div class="w-full md:w-5/6 lg:w-5/6 flex-1 py-4 pt-5 overflow-hidden flex flex-col" id="maincontent">
                    {{ $slot }}
                </div>
            </main>

            @if (isset($footer))
                <footer class="flex bg-white shadow w-full border-t-4 border-gray-200">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 align-middle">
                        {{ $footer }}
                    </div>
                </footer>
            @endif
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

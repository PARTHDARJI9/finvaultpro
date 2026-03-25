<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FinVault Pro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/d49fed350e.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Alpine JS -->
        <script defer src="https://unpkg.com/alpinejs@1.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans text-slate-200 antialiased bg-slate-950">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-slate-900 shadow-2xl overflow-hidden sm:rounded-[2.5rem] border border-white/5 backdrop-blur-md">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

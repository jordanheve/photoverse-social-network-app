<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photoverse</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        @livewireStyles
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased bg-zinc-50 min-h-screen flex flex-col justify-center pt-14 max-sm:pb-14 pb-4">
        <header class="fixed shadow-sm  top-0 w-full bg-zinc-50 z-50 ">
            @yield('header')
        </header>
        @yield('content')

                
                <footer class="text-center text-xs h-4 max-md:h-14 fixed bottom-0 w-full bg-zinc-50 z-50 text-slate-600 shadow flex flex-col">
                    <a href="{{route('feed')}}" class=" md:hidden text-3xl font-extralight italic text-center text-slate-700">Photoverse</a>
                    <div>

                        <span class="max-md:hidden">
                            {{now()->year}} Photoverse 
                        </span>
                        
                        <a href="https://jordanheve.github.io/portfolio/" target="_blank" rel="noreferrer">by  JordanHeve</a>
                    </div>
                </footer>
                @livewireScripts
    </body>
</html>

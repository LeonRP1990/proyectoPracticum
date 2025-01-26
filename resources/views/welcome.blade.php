<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Bienvenido</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 text-white min-h-screen">
        <div class="relative flex flex-col items-center justify-center min-h-screen">
            <!-- Encabezado -->
            <div class="text-center">
                <h1 class="text-5xl font-bold drop-shadow-lg">
                    Bienvenido a Laravel
                </h1>
                <p class="mt-4 text-xl text-gray-200 font-medium">
                    Explora la documentación, tutoriales y más.
                </p>
            </div>

            <!-- Tarjetas con enlaces -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-6 max-w-6xl">
                <!-- Tarjeta 1 -->
                <a href="https://laravel.com/docs" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 text-center">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-gray-800">Documentación</h3>
                    <p class="mt-4 text-gray-600">
                        Encuentra guías detalladas para aprender Laravel, desde conceptos básicos hasta avanzados.
                    </p>
                </a>

                <!-- Tarjeta 2 -->
                <a href="https://laracasts.com" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 text-center">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-pink-100 text-pink-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-gray-800">Laracasts</h3>
                    <p class="mt-4 text-gray-600">
                        Aprende Laravel, PHP y JavaScript con miles de tutoriales en video.
                    </p>
                </a>

                <!-- Tarjeta 3 -->
                <a href="https://laravel-news.com" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 text-center">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-yellow-100 text-yellow-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3M9 3L5 6.5M9 3l4 3.5M21 14h-8m-4 7v-6m0 0l-3 3m3-3l3 3" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-gray-800">Laravel News</h3>
                    <p class="mt-4 text-gray-600">
                        Las últimas noticias, tutoriales y actualizaciones del ecosistema Laravel.
                    </p>
                </a>
            </div>

            <!-- Pie de página -->
            <div class="mt-12 text-center text-sm text-gray-300">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Farmacia Hno Pedro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Secular+One&display=swap');

        * {
            font-family: 'Secular One', sans-serif;
        }
        @keyframes levitate {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .texto-levitante {
            animation: levitate 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="">
    <div class="bg-teal-500 bg-opacity-60 bg-gradient-to-t from-violet-200">
        <div class="flex justify-center space-x-3 p-2 items-center">
            <div class="w-24 p-2 border-4 border-teal-500 rounded-full">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo">
            </div>
            <div class="text-center flex-grow font-bold text-4xl bg-white text-teal-500 p-2 rounded-xl">
                Estilos Frans
            </div>
            @if (Route::has('login'))
                <div class="p-2">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-teal-400 text-white border-teal-600 border-4 py-2 px-4 hover:rounded-md hover:bg-emerald-400 text-md w-24">Inicio</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-teal-400 text-white border-teal-600 border-4 py-2 px-4 hover:rounded-md hover:bg-emerald-400 text-md w-24">Log
                            in</a>
                    @endauth
                </div>
            @endif
        </div>
        <div class="row flex items-center text-center">
            <div class="w-3/6 pl-20">
                <img src="{{ asset('images/fondo.png') }}" alt="Logo">
            </div>
            <div class="w-3/6 texto-levitante text-teal-600">
                <div class="flex-grow font-bold text-5xl">¡BIENVENIDO!</div>
                <div class="py-3">
                    <p>Sistema de Ventas diseñado para Estilos Frans</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

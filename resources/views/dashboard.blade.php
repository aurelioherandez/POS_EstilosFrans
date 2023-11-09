@extends('adminlte::page')

@section('title', 'Inicio')

@vite('resources/css/app.css')

@section('content')
    <div class="container pt-4 grid-cols-12">
        <div class="card">
            <div class="mx-auto p-1 font-bold vw text-amber-400 text-responsive">
                ¡¡¡BIENVENIDO!!!
            </div>
            <div class="card-body">
                <div class="text-center text-black font-bold text-xl">
                    *SISTEMA DE VENTAS*
                    <br>
                    ESTILOS FRANS
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }

        .card-icon {
            font-size: 24px;
            margin-right: 20px;
        }

        .text-responsive {
            font-size: 7vw;
        }
    </style>
@stop

@section('js')
@stop

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@stop

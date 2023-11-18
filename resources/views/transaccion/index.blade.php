@extends('adminlte::page')

@section('title', 'Movimientos')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card row mb-4">
                <div class="">
                    <a href="{{ route('movimientos.index') }}">
                        <button type="button"
                            class="bg-red-500 hover:bg-red-700 px-3 py-2 rounded-md text-white font-bold text-center">
                            <span class="fas fa-angle-left"></span>
                        </button>
                    </a>
                </div>
                <div class=" mx-auto text-teal-500 font-bold text-3xl">
                    MOVIMIENTOS
                </div>
                <div class="card-body">
                    {{-- <div class="col py-2">
                        <a href="{{ route('transaccion.index') }}">
                            <button class="bg-cyan-600 text-white hover:bg-cyan-700 p-2 rounded-md text-md"><span
                                    class="fas fa-fw fa-plus"></span>
                                Nueva Compra
                            </button>
                        </a>
                    </div> --}}
                    <table class="table table-auto">
                        <thead class="bg-info">
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th class="text-center">Venta</th>
                                <th class="text-center">Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                                <tr>
                                    <td>{{ $movimiento->tipo }} # {{ $movimiento->id }}</td>
                                    <td>
                                        <i class="fas fa-calendar"></i>
                                        {{ $movimiento->created_at }}
                                    </td>
                                    <td class="text-center">
                                        @if ($movimiento->tipo == 'venta')
                                            Q. {{ $movimiento->total }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($movimiento->tipo == 'compra')
                                            Q. {{ $movimiento->total }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="text-end font-bold">Totales:</td>
                                <td class="text-center">Q. {{ $totalVentas }}</td>
                                <td class="text-center">Q. {{ $totalCompras }}</td>
                            </tr>
                            {{-- @foreach ($movimientos as $item)
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('movimientos.show', ['movimiento' => $item]) }}">
                                                <button type="submit" class="bg-success py-2 px-3 rounded-md"><span
                                                        class="fas fa-fw fa-file text-white"></span></button>
                                            </a>
                                            <button type="button" class="bg-danger py-2 px-3 rounded-md"
                                                data-toggle="modal" data-target="#confirmModal-{{ $item->id }}"><span
                                                    class="fas fa-fw fa-trash text-white"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            display: flex;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }
    </style>
@endpush

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@stop

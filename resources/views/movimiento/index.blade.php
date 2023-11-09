@extends('adminlte::page')

@section('title', 'Movimientos')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-teal-500 font-bold text-3xl">
                    MOVIMIENTOS
                </div>
                <div class="card-body">
                    <div class="col py-2">
                        <a href="{{ route('transacciones.index') }}">
                            <button class="bg-cyan-600 text-white hover:bg-cyan-700 p-2 rounded-md text-md"><span
                                    class="fas fa-fw fa-eye"></span>
                                Ver todos
                            </button>
                        </a>
                    </div>
                    <div id="content-table">
                        <table class="table table-auto whitespace-nowrap">
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
    </div>

@stop

@push('css')
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
@stop

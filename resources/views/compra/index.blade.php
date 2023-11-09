@extends('adminlte::page')

@section('title', 'Compras')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    COMPRAS
                </div>
                <div class="card-body">
                    <div class="col py-2">
                        <a href="{{ route('compras.create') }}">
                            <button class="btn btn-warning text-whitep-2 rounded-md text-md"><span
                                    class="fas fa-fw fa-plus"></span>
                                Nueva
                            </button>
                        </a>
                    </div>
                    <div id="content-table">
                        <table class="table table-auto">
                            <thead class="bg-black">
                                <tr>
                                    <th>Comprobante</th>
                                    <th>Proveedor</th>
                                    <th>Fecha y hora</th>
                                    <th>Total</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $item)
                                    <tr>
                                        <td>
                                            <p class="text-muted mb-0">{{ $item->numero_comprobante }}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">{{ $item->proveedore->persona->razon_social }}</p>
                                        </td>
                                        <td>
                                            <div class="row-not-space">
                                                <p class="fw-semibold mb-1"><span
                                                        class="m-1"></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('d-m-Y') }}
                                                </p>
                                                <p class="fw-semibold mb-0"><span
                                                        class="m-1"></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('H:i') }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            Q. {{ $item->total }}
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a href="{{ route('compras.show', ['compra' => $item]) }}">
                                                    <button type="submit" class="bg-success py-2 px-3 rounded-md">
                                                        ver
                                                    </button>
                                                </a>
                                                <button type="button" class="bg-danger py-2 px-3 rounded-md"
                                                    data-toggle="modal" data-target="#confirmModal-{{ $item->id }}">
                                                    eliminar</button>

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal de confirmación-->
                                    <div class="modal fade" id="confirmModal-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de
                                                        confirmación
                                                    </h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Seguro que quieres eliminar el registro?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <form action="{{ route('compras.destroy', ['compra' => $item->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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

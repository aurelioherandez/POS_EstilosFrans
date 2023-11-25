@extends('adminlte::page')

@section('title', 'Roles')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    ROLES
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <a href="{{ route('roles.create') }}">
                            <button type="button" class="bg-amber-500 hover:bg-amber-600 px-3 py-2 rounded-md text-white font-bold">>Añadir nuevo rol</button>
                        </a>
                    </div>
                    <div id="content-table">
                        <table id="datatablesSimple" class="table table-striped fs-6">
                            <thead class="bg-black text-white">
                                <tr>
                                    <th>Rol</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td class="grid justify-items-center">
                                            <div class="row text-center space-x-2">
                                                <div>
                                                    {{-- @can('editar-user') --}}
                                                    <form action="{{ route('roles.edit', ['role' => $item]) }}" method="get">
                                                        <button type="submit" class="bg-warning py-2 px-3 rounded-md">
                                                            Editar
                                                        </button>
                                                    </form>
                                                    {{-- @endcan --}}
                                                </div>
                                                <div>
                                                    {{-- @can('eliminar-user') --}}
                                                    <button title="Eliminar" data-toggle="modal"
                                                        data-target="#confirmModal-{{ $item->id }}"
                                                        class="bg-danger py-2 px-3 rounded-md">
                                                        Eliminar
                                                    </button>
                                                    {{-- @endcan --}}
                                                </div>
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
                                                        confirmación</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Seguro que quieres eliminar el rol?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <form action="{{ route('roles.destroy', ['role' => $item->id]) }}"
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

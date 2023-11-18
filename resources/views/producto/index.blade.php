@extends('adminlte::page')

@section('title', 'Productos')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    PRODUCTOS
                </div>
                <div class="card-body">
                    <div class="container mx-auto pb-2">
                        <div class="row">
                            <div class="col pl-0">
                                <a href="{{ route('productos.create') }}">
                                    <button class="btn btn-warning text-white p-2 rounded-md text-md"><span
                                            class="fas fa-fw fa-plus"></span>
                                        Añadir
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="content-table">
                        <table class="table table-hover whitespace-nowrap text-md" id="myTable">
                            <thead class="bg-black text-white">
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha de Vencimiento</th>
                                    <th>Stock</th>
                                    <th>Marca</th>
                                    <th>Presentación</th>
                                    <th>Talla</th>
                                    <th>Categorías</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $item)
                                    <tr>
                                        <td class="text-right">
                                            {{ $item->codigo }}
                                        </td>
                                        <td>
                                            {{ $item->nombre }}
                                        </td>
                                        <td>
                                            {{ $item->descripcion }}
                                        </td>
                                        <td class="text-right">
                                            {{ $item->fecha_vencimiento }}
                                        </td>
                                        <td class="text-center">
                                            @if ($item->stock == 0)
                                                <span
                                                    class=" py-1 px-2 rounded-sm">{{ $item->stock }}</span>
                                            @elseif ($item->stock <= 10)
                                                <span
                                                    class="py-1 px-1 rounded-sm">{{ $item->stock }}</span>
                                            @else
                                                <span
                                                    class="py-1 px-1 rounded-sm">{{ $item->stock }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->marca->caracteristica->nombre }}
                                        </td>
                                        <td>
                                            {{ $item->presentacione->caracteristica->nombre }}
                                        </td>
                                        <td>
                                            {{ $item->laboratorio->caracteristica->nombre }}
                                        </td>
                                        <td>
                                            @foreach ($item->categorias as $category)
                                                <div class="container text-center">
                                                    <div class="row py-0.5">
                                                        <span
                                                            class="rounded-md py-1 px-2 w-full">{{ $category->caracteristica->nombre }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if ($item->estado == 1)
                                                <span class="rounded-md py-1 px-2 w-full">activo</span>
                                            @else
                                                <span class="rounded-md py-1 px-2 w-full">eliminado</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('productos.edit', ['producto' => $item]) }}">
                                                <button type="submit" class="bg-warning py-2 px-3 rounded-md">
                                                    editar
                                                </button>
                                            </a>
                                            <form action="{{ route('productos.destroy', ['producto' => $item->id]) }}"
                                                class="d-inline" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                @if ($item->estado == 1)
                                                    <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 py-2 px-3 rounded-md">
                                                        eliminar
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        class="bg-slate-500 hover:bg-slate-600 py-2 px-3 rounded-md">
                                                        restaurar
                                                    </button>
                                                @endif

                                            </form>
                                        </td>
                                    </tr>
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, j, visible;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Comienza desde 1 en lugar de 0 para ignorar el encabezado
                visible = false;
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        visible = true;
                    }
                }
                if (visible === true) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
@stop

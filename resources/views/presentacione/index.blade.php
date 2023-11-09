@extends('adminlte::page')

@section('title', 'Presentaciones')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="row pt-4">
            <div class="col">
                <div class="card">
                    <div class=" mx-auto text-amber-500 font-bold text-3xl">
                        PRESENTACIONES
                    </div>
                    <div class="card-body">
                        <div class="container mx-auto pb-2">
                            <div class="row">
                                <div class="col pl-0">
                                    <a href="{{ route('presentaciones.create') }}">
                                        <button class="btn btn-warning text-white p-2 rounded-md text-md"><span
                                                class="fas fa-fw fa-plus"></span>
                                            Añadir
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="content-table">
                            <table class="table table-auto whitespace-nowrap text-md" id="myTable">
                                <thead class="bg-black text-white">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presentaciones as $presentacione)
                                        <tr>
                                            <td>
                                                {{ $presentacione->caracteristica->nombre }}
                                            </td>
                                            <td>
                                                {{ $presentacione->caracteristica->descripcion }}
                                            </td>
                                            <td class="text-center">
                                                @if ($presentacione->caracteristica->estado == 1)
                                                    <span class="rounded-md py-1 px-2">activo</span>
                                                @else
                                                    <span class="rounded-md py-1 px-2">eliminado</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('presentaciones.edit', ['presentacione' => $presentacione]) }}">
                                                    <button type="submit" class="bg-warning py-2 px-3 rounded-md">
                                                        editar
                                                    </button>
                                                </a>
                                                <form
                                                    action="{{ route('presentaciones.destroy', ['presentacione' => $presentacione->id]) }}"
                                                    class="d-inline form-eliminar" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    @if ($presentacione->caracteristica->estado == 1)
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

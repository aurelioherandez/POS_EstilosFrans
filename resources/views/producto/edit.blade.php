@extends('adminlte::page')

@section('title', 'Productos')

@vite('resources/css/app.css')

@section('content')

    <div class="container mx-auto">
        <div class="row pt-4">
            <div class="col">
                <div class="card">
                    <div class=" mx-auto text-amber-500 font-bold text-3xl pt-3">
                        EDITAR PRODUCTO
                    </div>
                    <form action="{{ route('productos.update', ['producto' => $producto]) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="codigo">Código</label>
                                        <input type="text" name="codigo" id="codigo" class="w-full form-control"
                                            value="{{ old('codigo', $producto->codigo) }}">
                                        @error('codigo')
                                            <small class="text-danger">{{ '*' . $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="w-full form-control"
                                            value="{{ old('nombre', $producto->nombre) }}">
                                        @error('nombre')
                                            <small class="text-danger">{{ '*' . 'El campo Nombre es obligatorio' }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" class="w-full form-control"
                                    value="{{ old('descripcion', $producto->descripcion) }}">
                            </div>
                            <div class="col-md-12 pt-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                                        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento"
                                            class="w-full form-control"
                                            value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}"
                                            min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="marca_id" class="form-label">Marca:</label>
                                        <select data-size="4" title="Seleccione una marca" data-live-search="true"
                                            name="marca_id" id="marca_id" class="form-control selectpicker show-tick">
                                            @foreach ($marcas as $item)
                                                @if ($producto->marca_id == $item->id)
                                                    <option selected value="{{ $item->id }}"
                                                        {{ old('marca_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        {{ old('marca_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('marca_id')
                                            <small class="text-danger">{{ '*' . 'El campo Marca es obligatorio' }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="presentacione_id" class="form-label">Presentación:</label>
                                        <select data-size="4" title="Seleccione una presentación" data-live-search="true"
                                            name="presentacione_id" id="presentacione_id"
                                            class="form-control selectpicker show-tick">
                                            @foreach ($presentaciones as $item)
                                                @if ($producto->presentacione_id == $item->id)
                                                    <option selected value="{{ $item->id }}"
                                                        {{ old('presentacione_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        {{ old('presentacione_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('presentacione_id')
                                            <small
                                                class="text-danger">{{ '*' . 'El campo Presentación es obligatorio' }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="categorias" class="form-label">Categorías:</label>
                                        <select data-size="4" title="Seleccione las categorías" data-live-search="true"
                                            name="categorias[]" id="categorias" class="form-control selectpicker show-tick"
                                            multiple>
                                            @foreach ($categorias as $item)
                                                @if (in_array($item->id, $producto->categorias->pluck('id')->toArray()))
                                                    <option selected value="{{ $item->id }}"
                                                        {{ in_array($item->id, old('categorias', [])) ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, old('categorias', [])) ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('categorias')
                                            <small class="text-danger">{{ '*' . 'El campo Categoría es obligatorio' }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="laboratorio_id" class="form-label">Talla:</label>
                                        <select data-size="4" title="Seleccione una talla" data-live-search="true"
                                            name="laboratorio_id" id="laboratorio_id"
                                            class="form-control selectpicker show-tick">
                                            @foreach ($laboratorios as $item)
                                                @if ($producto->laboratorio_id == $item->id)
                                                    <option selected value="{{ $item->id }}"
                                                        {{ old('laboratorio_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        {{ old('presentacione_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('laboratorio_id')
                                            <small
                                                class="text-danger">{{ '*' . 'El campo Laboratorio es obligatorio' }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center space-x-4">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 px-3 py-2 rounded-md text-white font-bold">
                                Guardar
                            </button>
                            <a href="{{ route('productos.index') }}">
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-700 px-3 py-2 rounded-md text-white font-bold">
                                    Cancelar
                                </button>
                            </a>
                        </div>
                    </form>
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
        let input = document.querySelector('#lote');
        input.addEventListener('keypress', function(e) {
            if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                e.preventDefault();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
@stop

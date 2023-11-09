@extends('adminlte::page')

@section('title', 'Marcas')

@vite('resources/css/app.css')

@section('content')
    <div class="container pt-4 mx-auto">
        <div class="card">
            <div class="mx-auto text-amber-500 font-bold text-3xl">
                EDITAR MARCA
            </div>
            <form action="{{ route('marcas.update', ['marca' => $marca]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                value="{{ old('nombre', $marca->caracteristica->nombre) }}">
                            @error('nombre')
                                <small class="text-red-500 font-bold">{{ '*' . 'El campo nombre es requerido' }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <input name="descripcion" id="descripcion" rows="3" class="form-control"
                                value="{{ old('descripcion', $marca->caracteristica->descripcion) }}">
                        </div>
                    </div>
                </div>
                <div class="text-center space-x-4">
                    <button type="submit"
                        class="btn btn-success px-3 py-2 rounded-md text-white font-bold">
                        Guardar
                    </button>
                    <a href="{{ route('marcas.index') }}">
                        <button type="button"
                            class="btn btn-danger px-3 py-2 rounded-md text-white font-bold">
                            Cancelar
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@push('css')
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

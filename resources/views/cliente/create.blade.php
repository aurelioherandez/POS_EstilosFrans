@extends('adminlte::page')

@section('title', 'Cliente')

@vite('resources/css/app.css')

@section('content')
    <div class="container pt-4 mx-auto">
        <div class="card">
            <div class="mx-auto text-amber-500 font-bold text-3xl">
                CREAR CLIENTE
            </div>
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tipo_persona" class="form-label">Tipo de cliente:</label>
                            <select class="form-control" name="tipo_persona" id="tipo_persona">
                                <option value="" selected disabled>Seleccione una opción</option>
                                <option value="natural" {{ old('tipo_persona') == 'natural' ? 'selected' : '' }}>Persona natural</option>
                                <option value="juridica" {{ old('tipo_persona') == 'juridica' ? 'selected' : '' }}>Persona jurídica</option>
                            </select>
                            @error('tipo_persona')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <!-------Razón social------->
                        <div class="col-12" id="box-razon-social">
                            <label id="label-natural" for="razon_social" class="form-label">Nombres y apellidos:</label>
                            <label id="label-juridica" for="razon_social" class="form-label">Nombre de la empresa:</label>

                            <input required type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social')}}">

                            @error('razon_social')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <!------Dirección---->
                        <div class="col-12">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input required type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}">
                            @error('direccion')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <!--------------Documento------->
                        <div class="col-md-4">
                            <label for="documento_id" class="form-label">Tipo de documento:</label>
                            <select class="form-control" name="documento_id" id="documento_id">
                                <option value="" selected disabled>Seleccione una opción</option>
                                @foreach ($documentos as $item)
                                <option value="{{$item->id}}" {{ old('documento_id') == $item->id ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                                @endforeach
                            </select>
                            @error('documento_id')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="numero_documento" class="form-label">Numero de documento:</label>
                            <input required type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{old('numero_documento')}}">
                            @error('numero_documento')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="nit" class="form-label">NIT:</label>
                            <input required type="text" name="nit" id="nit" class="form-control" value="{{old('nit')}}">
                            @error('nit')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center space-x-4">
                    <button type="submit"
                        class="btn btn-success px-3 py-2 rounded-md text-white font-bold">
                        Guardar
                    </button>
                    <a href="{{ route('clientes.index') }}">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
    $(document).ready(function() {
        $('#tipo_persona').on('change', function() {
            let selectValue = $(this).val();
            //natural //juridica
            if (selectValue == 'natural') {
                $('#label-juridica').hide();
                $('#label-natural').show();
            } else {
                $('#label-natural').hide();
                $('#label-juridica').show();
            }
            $('#box-razon-social').show();
        });
    });
</script>
@stop
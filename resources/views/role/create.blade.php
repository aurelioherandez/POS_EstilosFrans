@extends('adminlte::page')

@section('title', 'Roles')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-3">
            <div class="card mb-4">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    CREAR ROL
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <!---Nombre de rol---->
                        <div class="row mb-4">
                            <label for="name" class="col-md-auto col-form-label">Nombre del rol:</label>
                            <div class="col-md-4">
                                <input autocomplete="off" type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="col-md-4">
                                @error('name')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!---Permisos---->
                        <div class="grid grid-cols-4 gap-2 pb-2 pt-1">
                            <div class="text-muted">Permisos para el rol:</div>
                            @foreach ($permisos as $item)
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permission[]" id="{{ $item->id }}"
                                        class="form-check-input" value="{{ $item->name }}">
                                    <label for="{{ $item->id }}" class="form-check-label">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                            <small class="text-danger">{{ '*' . $message }}</small>
                        @enderror

                        <div class="text-center space-x-4">
                            <button type="submit"
                            class="bg-green-500 hover:bg-green-600 px-3 py-2 rounded-md text-white font-bold">
                                Guardar
                            </button>
                            <a href="{{ route('roles.index') }}">
                                <button type="button"
                                class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-white font-bold">
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

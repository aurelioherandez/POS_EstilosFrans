@extends('adminlte::page')

@section('title', 'Usuarios')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    CREAR USUARIO
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
            
                            <!---Nombre---->
                            <div class="row mb-4">
                                <label for="name" class="col-lg-2 col-form-label">Nombres:</label>
                                <div class="col-lg-4">
                                    <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{old('name')}}" aria-labelledby="nameHelpBlock">
                                </div>
                                <div class="col-lg-2">
                                    @error('name')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Email---->
                            <div class="row mb-4">
                                <label for="email" class="col-lg-2 col-form-label">Email:</label>
                                <div class="col-lg-4">
                                    <input autocomplete="off" type="email" name="email" id="email" class="form-control" value="{{old('email')}}" aria-labelledby="emailHelpBlock">
                                </div>
                                <div class="col-lg-2">
                                    @error('email')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Password---->
                            <div class="row mb-4">
                                <label for="password" class="col-lg-2 col-form-label">Contraseña:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password" id="password" class="form-control" aria-labelledby="passwordHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="passwordHelpBlock">
                                        Escriba una constraseña segura. Debe incluir números.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Confirm_Password---->
                            <div class="row mb-4">
                                <label for="password_confirm" class="col-lg-2 col-form-label">Confirmar:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" aria-labelledby="passwordConfirmHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="passwordConfirmHelpBlock">
                                        Vuelva a escribir su contraseña.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password_confirm')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Roles---->
                            <div class="row mb-4">
                                <label for="role" class="col-lg-2 col-form-label">Rol:</label>
                                <div class="col-lg-4">
                                    <select name="role" id="role" class="form-control" aria-labelledby="rolHelpBlock">
                                        <option value="" selected disabled>Seleccione un rol:</option>
                                        @foreach ($roles as $item)
                                        <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    @error('role')
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
                            <a href="{{ route('users.index') }}">
                                <button type="button"
                                    class="btn btn-danger px-3 py-2 rounded-md text-white font-bold">
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

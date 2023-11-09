@extends('adminlte::page')

@section('title', 'Roles')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-3">
            <div class="card mb-4">
                <div class=" mx-auto text-amber-500 font-bold text-3xl">
                    EDITAR ROL
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update',['role'=>$role]) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <!---Nombre de rol---->
                        <div class="row mb-4">
                            <label for="name" class="col-md-auto col-form-label">Nombre del rol:</label>
                            <div class="col-md-4">
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name',$role->name)}}">
                            </div>
                            <div class="col-md-4">
                                @error('name')
                                <small class="text-danger">{{'*'.$message}}</small>
                                @enderror
                            </div>
                        </div>
        
                        <!---Permisos---->
                        <div class="grid grid-cols-4 gap-2 pb-2 pt-1">
                            <p class="text-muted">Permisos para el rol:</p>
                            @foreach ($permisos as $item)
                            @if ( in_array($item->id, $role->permissions->pluck('id')->toArray() ) )
                            <div class="form-check mb-2">
                                <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->name}}">
                                <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                            </div>
                            @else
                            <div class="form-check mb-2">
                                <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->name}}">
                                <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @error('permission')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
        
        
                        <div class="text-center space-x-4">
                            <button type="submit"
                                class="btn btn-success px-3 py-2 rounded-md text-white font-bold">
                                Guardar
                            </button>
                            <a href="{{ route('roles.index') }}">
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

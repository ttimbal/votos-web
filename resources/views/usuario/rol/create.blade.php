@extends('layouts.app')

@section('page-title', 'Rol')

@section('navbar-logo', 'Havla - Rol')

@section('breadcrumbs')
    <a href="{{ route('roles.index') }}" class="breadcrumb">Gestionar Rol</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación de Rol</h3>
                    {{--                    @foreach ($errors->all() as $message)--}}
                    {{--                        <p class="flow-text">{{ $message }}</p>--}}
                    {{--                    @endforeach--}}
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nombre" name="nombre" type="text" class="validate" value="{{ old('nombre') }}">
                            <label for="nombre">Nombre</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('nombre')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field col s6">
                            <select multiple name="permisos[]">
                                <option value="" disabled>Seleccione Permisos</option>
                                @foreach($todosLosPermisos as $permisoActual)
                                    <option value="{{ $permisoActual->name }}">{{ $permisoActual->name }}</option>
                                @endforeach
                            </select>
                            <label>Permisos</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('page-title', 'Permiso')

@section('navbar-logo', 'Havla - Permiso')

@section('breadcrumbs')
    <a href="{{ route('permisos.index') }}" class="breadcrumb">Gestionar Permiso</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('permisos.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación de Permiso</h3>
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
                            <select multiple name="roles[]">
                                <option value="" disabled>Seleccione Roles</option>
                                @foreach($todosLosRoles as $rol)
                                    <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                @endforeach
                            </select>
                            <label>Roles</label>
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

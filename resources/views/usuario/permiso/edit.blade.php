@extends('layouts.app')

@section('page-title', 'Permiso')

@section('navbar-logo', 'Havla - Permiso')

@section('breadcrumbs')
    <a href="{{ route('permisos.index') }}" class="breadcrumb">Gestionar Permiso</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('permisos.update', [$permiso->id]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel purple grey lighten-4">
                    <h3 class="center">Formulario de edición</h3>
                    {{--                    @foreach ($errors->all() as $message)--}}
                    {{--                        <p class="flow-text">{{ $message }}</p>--}}
                    {{--                    @endforeach--}}
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nombre" name="nombre" type="text" class="validate" value="{{ (empty(old('nombre'))) ? $permiso->name : old('nombre') }}">
                            <label for="nombre">Nombre</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('nombre')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field col s6">
                            <select multiple name="roles[]">
                                @foreach($todosLosRoles as $rolActual)
                                    @php
                                        $marcar = false;
                                    @endphp
                                    @foreach($permiso->roles as $rol)
                                        @if($rolActual->id == $rol->id)
                                            @php
                                                $marcar = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <option value="{{ $rolActual->name }}" {{ $marcar ? 'selected' : '' }}>{{ $rolActual->name }}</option>
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

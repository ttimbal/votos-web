@extends('layouts.app')

@section('page-title', 'Rol')

@section('navbar-logo', 'Havla - Rol')

@section('breadcrumbs')
    <a href="{{ route('roles.index') }}" class="breadcrumb">Gestionar Rol</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('roles.update', [$rol->id]) }}">
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
                            <input id="nombre" name="nombre" type="text" class="validate" value="{{ (empty(old('nombre'))) ? $rol->name : old('nombre') }}">
                            <label for="nombre">Nombre</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('nombre')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field col s6">
                            <select multiple name="permisos[]">
                                @foreach($todosLosPermisos as $permiso)
                                    @php
                                    $marcar = false
                                    @endphp
                                    @foreach($rol->permissions as $permission)
                                        @if($permiso->id == $permission->id)
                                            @php
                                                $marcar = true
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($marcar)
                                        <option value="{{ $permiso->name }}" selected>{{ $permiso->name }}</option>
                                    @else
                                        <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
                                    @endif
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

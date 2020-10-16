@extends('layouts.app')

@section('page-title', 'Usuario')

@section('navbar-logo', 'Havla - Usuario')

@section('breadcrumbs')
    <a href="{{ route('usuarios.index') }}" class="breadcrumb">Gestionar Usuario</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s4 offset-s4">
            <div class="card blue lighten-5">
                <div class="card-content text-darken-1">
                    <h3 class="center">Formulario De Edición</h3>
                    <div class="row">
                        <form method="POST" action="{{ route('usuarios.update', [$usuario->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="input-field col s12">
                                <select disabled name="persona_id">
                                    <option disabled selected>{{ $usuario->name }}</option>
                                </select>
                                <label>Persona</label>
                            </div>

                            <div class="input-field col s12">
                                <select multiple name="roles[]">
                                    <option value="" disabled>Seleccione roles</option>
                                    @foreach($roles as $rolActual)
                                        @php
                                            $marcado = false;
                                        @endphp
                                        @foreach($usuario->roles as $rol)
                                            @if($rol->id === $rolActual->id)
                                                @php
                                                    $marcado = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <option value="{{ $rolActual->name }}" {{ $marcado ? 'selected' : '' }}>{{ $rolActual->name }}</option>
                                    @endforeach
                                </select>
                                <label>Roles</label>
                            </div>

                            <div class="input-field col s12">
                                <select multiple name="permisos[]">
                                    <option value="" disabled>Seleccione Permisos</option>
                                    @foreach($permisos as $permisoActual)
                                        @php
                                            $marcado = false;
                                        @endphp
                                        @foreach($usuario->permissions as $permiso)
                                            @if($permiso->id === $permisoActual->id)
                                                @php
                                                    $marcado = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <option value="{{ $permisoActual->name }}" {{ $marcado ? 'selected' : '' }}>{{ $permisoActual->name }}</option>
                                    @endforeach
                                </select>
                                <label>Permisos</label>
                            </div>
                            <button class="btn-small waves-effect waves-light" type="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

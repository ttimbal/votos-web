@extends('layouts.app')

@section('page-title', 'Usuario')

@section('navbar-logo', 'Havla - Usuario')

@section('breadcrumbs')
    <a href="{{ route('usuarios.index') }}" class="breadcrumb">Gestionar Usuario</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s4 offset-s4">
            <div class="card blue lighten-5">
                <div class="card-content text-darken-1">
                    <h3 class="center">Formulario De Registro</h3>
                    <div class="row">
                        <form method="POST" action="{{ route('usuarios.store') }}">
                            @csrf
                            <div class="input-field col s12">
                                <select name="persona_id">
                                    <option value="" disabled selected>Seleccione una persona</option>
                                    @foreach($administrativosSinRegistrar as $administrativo)
                                        <option value="{{ $administrativo->id }}">{{ $administrativo->nombre.' - '.$administrativo->cargo }}</option>
                                    @endforeach
                                    @foreach($docentesSinRegistrar as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre.' - Docente' }}</option>
                                    @endforeach
                                </select>
                                <label>Persona</label>
                            </div>

                            <div class="input-field col s12">
                                <select multiple name="roles[]">
                                    <option value="" disabled>Seleccione roles</option>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                                <label>Roles</label>
                            </div>

                            <div class="input-field col s12">
                                <select multiple name="permisos[]">
                                    <option value="" disabled>Seleccione Permisos</option>
                                    @foreach($permisos as $permiso)
                                        <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
                                    @endforeach
                                </select>
                                <label>Permisos</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password" type="password" name="password" class="validate">
                                <label for="password">Contraseña</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password" type="password" name="password_confirmation" class="validate">
                                <label for="password">Confirmar Contraseña</label>
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

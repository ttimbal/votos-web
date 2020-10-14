@extends('layouts.app')

@section('page-title', 'Asistencia')

@section('navbar-logo', 'Havla - Asistencia')

@section('breadcrumbs')
    <a href="{{ route('asistencias.index') }}" class="breadcrumb">Registrar Asistencia</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('asistencias.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de Creación</h3>
{{--                    @foreach ($errors->all() as $message)--}}
{{--                        <p class="flow-text">{{ $message }}</p>--}}
{{--                    @endforeach--}}
                    @error('persona_id')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="persona_id">
                                <option value="" disabled selected>escoja una persona</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->persona_id }}" {{ old('persona_id') == $docente->persona_id ? 'selected' : '' }}>{{ $docente->persona->nombre . ' - ' . 'Docente' }}</option>
                                @endforeach
                                @foreach($administrativos as $administrativo)
                                    <option value="{{ $administrativo->persona_id }}" {{ old('persona_id') == $administrativo->persona_id ? 'selected' : '' }}>{{ $administrativo->persona->nombre . ' - ' . $administrativo->cargo }}</option>
                                @endforeach
                            </select>
                            <label>Persona</label>
                        </div>
                    </div>
                    @error('estado')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="estado">
                                <option value="" disabled selected>Escoja un estado</option>
                                <option value="A" {{ old('estado') == 'A' ? 'selected' : '' }}>Asistencia</option>
                                <option value="F" {{ old('estado') == 'F' ? 'selected' : '' }}>Falta</option>
                                <option value="P" {{ old('estado') == 'P' ? 'selected' : '' }}>Permiso</option>
                            </select>
                            <label>Estado</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="fecha" type="text" class="datepicker" value="{{ old('fecha') }}">
                            <label>Fecha</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('fecha')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <button class="btn-small waves-effect waves-light" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('page-title', 'Grupo')

@section('navbar-logo', 'Havla - Grupo')

@section('breadcrumbs')
    <a href="{{ route('grupos.index') }}" class="breadcrumb">Gestionar Grupo</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('grupos.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12">
                            <select name="materia_sigla">
                                <option value="" disabled selected>Seleccione una materia</option>
                                @foreach($materias as $materia)
                                    <option value="{{ $materia->sigla }}">{{ $materia->nombre.' - '.$materia->sigla }}</option>
                                @endforeach
                            </select>
                            <label>Materia</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="grupo_nombre" class="validate">
                            <label>Nombre del grupo</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="docente_id">
                                <option value="" disabled selected>Seleccione un docente</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->persona_id }}">{{ $docente->persona->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Docente</label>
                        </div>
                        <div class="input-field col s12">
                            <select multiple name="horarios_id[]">
                                <option value="" disabled>Seleccione horarios</option>
                                @foreach($horarios as $horario)
                                    <option value="{{ $horario->id }}">{{ $horario->dia.' '.$horario->hora_inicio.' - '.$horario->hora_fin }}</option>
                                @endforeach
                            </select>
                            <label>Horarios</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="periodo_codigo">
                                <option value="" disabled selected>Seleccione un periodo</option>
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo->codigo }}">{{ $periodo->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Periodo</label>
                        </div>

                        <button class="btn waves-effect waves-light" type="submit">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

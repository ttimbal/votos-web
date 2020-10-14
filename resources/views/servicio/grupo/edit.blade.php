@extends('layouts.app')

@section('page-title', 'Grupo')

@section('navbar-logo', 'Havla - Grupo')

@section('breadcrumbs')
    <a href="{{ route('grupos.index') }}" class="breadcrumb">Gestionar Grupo</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('grupos.update', [$grupo->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de edición</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12">
                            <select name="materia_sigla">
                                @foreach($materias as $materia)
                                    <option value="{{ $materia->sigla }}" {{ $grupo->materia_sigla === $materia->sigla ? 'selected' : '' }}>{{ $materia->nombre.' - '.$materia->sigla }}</option>
                                @endforeach
                            </select>
                            <label>Materia</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="grupo_nombre" class="validate" value="{{ $grupo->nombre }}">
                            <label>Nombre del grupo</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="docente_id">
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->persona_id }}" {{ $grupo->docente_id === $docente->persona_id ? 'selected' : '' }}>{{ $docente->persona->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Docente</label>
                        </div>
                        <div class="input-field col s12">
                            <select multiple name="horarios_id[]">
                                @foreach($horarios as $horario)
                                    @php
                                        $valor = false
                                    @endphp
                                    @foreach($grupo_horarios as $grupo_horario)
                                        @if($grupo_horario->horario_id === $horario->id)
                                            @php
                                                $valor = true
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($valor)
                                        <option value="{{ $horario->id }}" selected>{{ $horario->dia.' '.$horario->hora_inicio.' - '.$horario->hora_fin }}</option>
                                    @else
                                        <option value="{{ $horario->id }}">{{ $horario->dia.' '.$horario->hora_inicio.' - '.$horario->hora_fin }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label>Horarios</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="periodo_codigo">
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo->codigo }}" {{ $grupo->periodo_codigo === $periodo->codigo ? 'selected' : '' }}>{{ $periodo->nombre }}</option>
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

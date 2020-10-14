@extends('layouts.app')

@section('page-title', 'Grupo')

@section('navbar-logo', 'Havla - Grupo')

@section('breadcrumbs')
    <a href="{{ route('grupos.index') }}" class="breadcrumb">Gestionar Grupo</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $grupo->id }}</P>
                <P class="white-text">Nombre: {{ $grupo->nombre }}</P>
                <P class="white-text">Docente: {{ $docente->nombre }}</P>
                <P class="white-text">Sigla materia: {{ $materia->sigla }}</P>
                <P class="white-text">Nombre materia: {{ $materia->nombre }}</P>
                <P class="white-text">Perioro: {{ $periodo->nombre }}</P>
                <P class="white-text">Horarios:</P>
                @foreach($horarios as $horario)
                    <P class="white-text">{{ $horario->dia.' '.$horario->hora_inicio.' - '.$horario->hora_fin }}</P>
                @endforeach
            </div>
        </div>
    </div>
@endsection

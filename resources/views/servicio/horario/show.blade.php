@extends('layouts.app')

@section('page-title', 'Horario')

@section('navbar-logo', 'Havla - Horario')

@section('breadcrumbs')
    <a href="{{ route('horarios.index') }}" class="breadcrumb">Gestionar Horario</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $horario->id }}</P>
                <P class="white-text">Día: {{ $horario->dia }}</P>
                <P class="white-text">Hora inicio: {{ $horario->hora_inicio }}</P>
                <P class="white-text">Hora fin: {{ $horario->hora_fin }}</P>
            </div>
        </div>
    </div>
@endsection

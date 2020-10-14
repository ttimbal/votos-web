@extends('layouts.app')

@section('page-title', 'Periodo')

@section('navbar-logo', 'Havla - Periodo')

@section('breadcrumbs')
    <a href="{{ route('periodos.index') }}" class="breadcrumb">Gestionar Periodo</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $periodo->codigo }}</P>
                <P class="white-text">Nombre: {{ $periodo->nombre }}</P>
                <P class="white-text">Fecha incio: {{ $periodo->fecha_inicio }}</P>
                <P class="white-text">Fecha fin: {{ $periodo->fecha_fin }}</P>
            </div>
        </div>
    </div>
@endsection

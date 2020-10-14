@extends('layouts.app')

@section('page-title', 'Especialidad')

@section('navbar-logo', 'Havla - Especialidad')

@section('breadcrumbs')
    <a href="{{ route('especialidades.index') }}" class="breadcrumb">Registrar Especialidad</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $especialidad->id }}</P>
                <P class="white-text">Nombre: {{ $especialidad->nombre }}</P>
            </div>
        </div>
    </div>
@endsection

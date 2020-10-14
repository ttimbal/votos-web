@extends('layouts.app')

@section('page-title', 'Docente')

@section('navbar-logo', 'Havla - Docente')

@section('breadcrumbs')
    <a href="{{ route('docentes.index') }}" class="breadcrumb">Gestionar Docente</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $docente->persona_id }}</P>
                <P class="white-text">Nombre: {{ $docente->persona->nombre }}</P>
                <P class="white-text">Direccion: {{ $docente->persona->direccion }}</P>
                @for($contador = 1; $contador <= sizeof($docente->telefonos); $contador++)
                    <P class="white-text">{{ "Telefono ".$contador }} : {{ $docente->telefonos[$contador - 1]->numero }}</P>
                @endfor
                <P class="white-text">Activo: {{ $docente->persona->activo === 1? "Si" : "No"}}</P>
                @for($contador = 1; $contador <= sizeof($docente->especialidades); $contador++)
                    <P class="white-text">{{ 'Especialidad'.$contador }} : {{ $docente->especialidades[$contador - 1]->nombre }}</P>
                @endfor
                <P class="white-text">Correo: {{ $docente->persona->correo }}</P>
                <P class="white-text">CI: {{ $docente->persona->ci_nit }}</P>
                <P class="white-text">Inicio: {{ $docente->inicio }}</P>
            </div>
        </div>
    </div>
@endsection

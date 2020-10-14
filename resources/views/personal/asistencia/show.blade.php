@extends('layouts.app')

@section('page-title', 'Asistencia')

@section('navbar-logo', 'Havla - Asistencia')

@section('breadcrumbs')
    <a href="{{ route('asistencias.index') }}" class="breadcrumb">Registrar Asistencia</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $asistencia->id }}</P>
                <P class="white-text">Fecha: {{ $asistencia->fecha }}</P>
                <P class="white-text">Estado:
                    @switch($asistencia->estado)
                        @case('A')
                        {{ 'Asistencia' }}
                        @break
                        @case('P')
                        {{ 'Permiso' }}
                        @break
                        @case('F')
                        {{ 'Falta' }}
                        @break
                    @endswitch</P>

                <P class="white-text">Nombre: {{ $asistencia->persona->nombre }}</P>
                <P class="white-text">Cargo:
                    @if(empty($administrativo))
                        {{ 'Docente' }}
                    @else
                        {{ $administrativo->cargo }}
                    @endif
                </P>
            </div>
        </div>
    </div>
@endsection

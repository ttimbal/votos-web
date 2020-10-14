@extends('layouts.app')

@section('page-title', 'Materia')

@section('navbar-logo', 'Havla - Materia')

@section('breadcrumbs')
    <a href="{{ route('materias.index') }}" class="breadcrumb">Gestionar Materia</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">Sigla: {{ $materia->sigla }}</P>
                <P class="white-text">Nombre: {{ $materia->nombre }}</P>
                <P class="white-text">Precio: {{ $materia->precio }} Bs.</P>
                @for($contador = 0; $contador < sizeof($promociones); $contador++)
                    <P class="white-text">{{ "Promoción ".($contador + 1) }} : {{ $promociones[$contador]->nombre }}</P>
                @endfor
                @for($contador = 0; $contador < sizeof($cursos); $contador++)
                    <P class="white-text">{{ 'Curso '.($contador + 1) }} : {{ $cursos[$contador]->nombre }}</P>
                @endfor
            </div>
        </div>
    </div>
@endsection

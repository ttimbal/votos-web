@extends('layouts.app')

@section('page-title', 'Curso')

@section('navbar-logo', 'Havla - Curso')

@section('breadcrumbs')
    <a href="{{ route('cursos.index') }}" class="breadcrumb">Gestionar Cursos Ofertados</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s8 offset-l2">
            <div class="card-panel red lighten-5">
                <h3 class="center">Información del curso</h3>
                <P class="black-text">Código: {{ $curso->codigo }}</P>
                <P class="black-text">Nombre: {{ $curso->nombre }}</P>
                <P class="black-text">Duración: {{ $curso->duracion }} años</P>
                @if(!empty($materias))
                    <h4 class="center">Materias</h4>
                    <table class="highlight centered responsive-table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Sigla</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materias as $materia)
                            <tr>
                                <td>{{ $materia->nombre }}</td>
                                <td>{{ $materia->sigla }}</td>
                                <td>{{ $materia->precio }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

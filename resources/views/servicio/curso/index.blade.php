@extends('layouts.app')

@section('page-title', 'Curso')

@section('navbar-logo', 'Havla - Curso')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Cursos Ofertados</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Curso</h3>
            @can('curso crear')
                <a href="{{ route('cursos.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Duración(años)</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->codigo }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->duracion }}</td>
                        <td>
                            @can('curso ver')
                                <a href="{{ route('cursos.show', [$curso->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('curso editar')
                                <a href="{{ route('cursos.edit', [$curso->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('curso eliminar')
                                <form method="POST" action="{{ route('cursos.destroy', [$curso->codigo]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small waves-effect waves-light" type="submit"><i class="material-icons">delete</i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

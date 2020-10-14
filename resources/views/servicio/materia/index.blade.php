@extends('layouts.app')

@section('page-title', 'Materia')

@section('navbar-logo', 'Havla - Materia')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Materia</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Materia</h3>
            @can('materia crear')
                <a href="{{ route('materias.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Sigla</th>
                    <th>Nombre</th>
                    <th>Precio (Bs.)</th>
                    <th>Cursos</th>
                    <th>Promociones</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materias as $materia)
                    <tr>
                        <td>{{ $materia->sigla }}</td>
                        <td>{{ $materia->nombre }}</td>
                        <td>{{ $materia->precio }}</td>
                        <td>
                            @foreach($materia->cursos as $curso)
                                <p>{{ $curso->nombre }}</p>
                            @endforeach
                        </td>
                        <td>
                            @foreach($materia->promociones as $promocion)
                                <p>{{ $promocion->nombre }}</p>
                            @endforeach
                        </td>
                        <td>
                            @can('materia ver')
                                <a href="{{ route('materias.show', [$materia->sigla]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('materia editar')
                                <a href="{{ route('materias.edit', [$materia->sigla]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('materia eliminar')
                                <form method="POST" action="{{ route('materias.destroy', [$materia->sigla]) }}">
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

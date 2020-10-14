@extends('layouts.app')

@section('page-title', 'Grupo')

@section('navbar-logo', 'Havla - Grupo')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Grupo</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Registrar Grupo</h3>
            @can('grupo crear')
                <a href="{{ route('grupos.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Docente</th>
                    <th>Sigla Materia</th>
                    <th>Nombre Materia</th>
                    <th>Periodo</th>
                    <th>Horarios</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->nombre }}</td>
                        <td>{{ $grupo->docente->nombre }}</td>
                        <td>{{ $grupo->materia_sigla }}</td>
                        <td>{{ $grupo->materia->nombre }}</td>
                        <td>{{ $grupo->periodo->nombre }}</td>
                        <td>
                            @foreach($grupo->horarios as $horario)
                                <p>{{ $horario->dia.' '.$horario->hora_inicio.' - '.$horario->hora_fin }}</p>
                            @endforeach
                        </td>
                        <td>
                            @can('grupo ver')
                                <a href="{{ route('grupos.show', [$grupo->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('grupo editar')
                                <a href="{{ route('grupos.edit', [$grupo->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('grupo eliminar')
                                <form method="POST" action="{{ route('grupos.destroy', [$grupo->id]) }}">
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

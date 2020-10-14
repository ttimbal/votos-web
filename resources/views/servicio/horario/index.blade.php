@extends('layouts.app')

@section('page-title', 'Horario')

@section('navbar-logo', 'Havla - Horario')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Horario</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Horario</h3>
            @can('horario crear')
                <a href="{{ route('horarios.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Día</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id }}</td>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ $horario->hora_fin }}</td>
                        <td>
                            @can('horario ver')
                                <a href="{{ route('horarios.show', [$horario->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('horario editar')
                                <a href="{{ route('horarios.edit', [$horario->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('horario eliminar')
                                <form method="POST" action="{{ route('horarios.destroy', [$horario->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small waves-effect waves-light" type="submit" name="action"><i class="material-icons">delete</i></button>
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

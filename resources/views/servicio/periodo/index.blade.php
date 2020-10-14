@extends('layouts.app')

@section('page-title', 'Periodo')

@section('navbar-logo', 'Havla - Periodo')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Periodo</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Periodo</h3>
            @can('periodo crear')
                <a href="{{ route('periodos.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($periodos as $periodo)
                    <tr>
                        <td>{{ $periodo->codigo }}</td>
                        <td>{{ $periodo->nombre }}</td>
                        <td>{{ $periodo->fecha_inicio }}</td>
                        <td>{{ $periodo->fecha_fin }}</td>
                        <td>
                            @can('periodo ver')
                                <a href="{{ route('periodos.show', [$periodo->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('periodo editar')
                                <a href="{{ route('periodos.edit', [$periodo->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('periodo eliminar')
                                <form method="POST" action="{{ route('periodos.destroy', [$periodo->codigo]) }}">
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

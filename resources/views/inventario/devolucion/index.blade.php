@extends('layouts.app')

@section('page-title', 'Devolución')

@section('navbar-logo', 'Havla - Devolución')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Devolución</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Devoluciones</h3>
            @can('devolucion crear')
                <a href="{{ route('devoluciones.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Encargado de Almacen</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($devoluciones as $devolucion)
                    <tr>
                        <td>{{ $devolucion->id }}</td>
                        <td>{{ $devolucion->administrativo_persona->nombre }}</td>
                        <td>{{ $devolucion->persona->nombre }}</td>
                        <td>{{ $devolucion->fecha }}</td>
                        <td>{{ $devolucion->hora }}</td>
                        <td>
                            @can('devolucion ver')
                                <a href="{{ route('devoluciones.show', [$devolucion->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('devolucion editar')
                                <a href="{{ route('devoluciones.edit', [$devolucion->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('devolucion eliminar')
                                <form method="POST" action="{{ route('devoluciones.destroy', [$devolucion->id]) }}">
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

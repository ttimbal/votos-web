@extends('layouts.app')

@section('page-title', 'Prestamo')

@section('navbar-logo', 'Havla - Prestamo')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Préstamo</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">

            <h3 class="center">Prestamos</h3>
            @can('prestamo crear')
                <a href="{{ route('prestamos.create') }}" class="waves-effect waves-light btn-small green accent-3">
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
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->administrativo_persona->nombre }}</td>
                        <td>{{ $prestamo->persona->nombre }}</td>
                        <td>{{ $prestamo->fecha }}</td>
                        <td>{{ $prestamo->hora }}</td>
                        <td>
                            @can('prestamo ver')
                                <a href="{{ route('prestamos.show', [$prestamo->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
{{--                            @can('prestamo editar')--}}
{{--                                <a href="{{ route('prestamos.edit', [$prestamo->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>--}}
{{--                            @endcan--}}
                            @can('prestamo eliminar')
                                <form method="POST" action="{{ route('prestamos.destroy', [$prestamo->id]) }}">
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

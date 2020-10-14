@extends('layouts.app')

@section('page-title', 'Promocion')

@section('navbar-logo', 'Havla - Promocion')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Promoción</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Promocion</h3>
            @can('promocion crear')
                <a href="{{ route('promociones.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Descuento (%)</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promociones as $promocion)
                    <tr>
                        <td>{{ $promocion->id }}</td>
                        <td>{{ $promocion->nombre }}</td>
                        <td>{{ $promocion->fecha_inicio }}</td>
                        <td>{{ $promocion->fecha_fin }}</td>
                        <td>{{ $promocion->descuento }}</td>
                        <td>
                            @can('promocion ver')
                                <a href="{{ route('promociones.show', [$promocion->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('promocion editar')
                                <a href="{{ route('promociones.edit', [$promocion->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('promocion eliminar')
                                <form method="POST" action="{{ route('promociones.destroy', [$promocion->id]) }}">
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

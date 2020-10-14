@extends('layouts.app')

@section('page-title', 'Almacen')

@section('navbar-logo', 'Havla - Almacen')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Alamacen</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Almacenes</h3>
            @can('almacen crear')
                <a href="{{ route('almacenes.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->codigo }}</td>
                        <td>{{ $almacen->nombre }}</td>
                        <td>{{ $almacen->ubicacion }}</td>
                        <td>
                            @can('almacen ver')
                                <a href="{{ route('almacenes.show', [$almacen->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('almacen editar')
                                <a href="{{ route('almacenes.edit', [$almacen->codigo]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('almacen eliminar')
                                <form method="POST" action="{{ route('almacenes.destroy', [$almacen->codigo]) }}">
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

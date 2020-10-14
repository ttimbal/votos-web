@extends('layouts.app')

@section('page-title', 'Instrumento')

@section('navbar-logo', 'Havla - Instrumento')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Instrumento</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Instrumentos</h3>
            @can('instrumento crear')
                <a href="{{ route('instrumentos.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Proveedor</th>
                    <th>Almacen Nombre</th>
                    <th>Ubicación Almacen</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instrumentos as $instrumento)
                    <tr>
                        <th>{{ $instrumento->numero }}</th>
                        <td>{{ $instrumento->nombre_instrumento->nombre }}</td>
                        <td>{{ $instrumento->estado }}</td>
                        <td>{{ $instrumento->precio }}</td>
                        @if($instrumento->disponibilidad === 1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        @foreach($proveedores as $proveedor)
                            @if($instrumento->compra->proveedor_id === $proveedor->persona_id)
                                <td>{{ $proveedor->persona->nombre }}</td>
                            @endif
                        @endforeach
                        <td>{{ $instrumento->almacen->nombre }}</td>
                        <td>{{ $instrumento->almacen->ubicacion }}</td>
                        <td>
                            @can('instrumento ver')
                                <a href="{{ route('instrumentos.show', [$instrumento->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('instrumento editar')
                                <a href="{{ route('instrumentos.edit', [$instrumento->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('instrumento eliminar')
                                <form method="POST" action="{{ route('instrumentos.destroy', [$instrumento->numero]) }}">
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

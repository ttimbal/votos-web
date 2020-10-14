@extends('layouts.app')

@section('page-title', 'Proveedor')

@section('navbar-logo', 'Havla - Proveedor')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Proveedores</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Proveedores</h3>
            @can('proveedor crear')
                <a href="{{ route('proveedores.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfonos</th>
                    <th>Activo</th>
                    <th>Correo</th>
                    <th>Ci/Nit</th>
                    <th>Ciudad</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->persona_id }}</td>
                        <td>{{ $proveedor->persona->nombre }}</td>
                        <td>{{ $proveedor->persona->direccion }}</td>
                        <td>
                            @foreach($proveedor->telefonos as $telefono)
                                <p>{{ $telefono->numero }}</p>
                            @endforeach
                        </td>
                        <td>{{ $proveedor->persona->activo === 1 ? "Si" : "No" }}</td>
                        <td>{{ $proveedor->persona->correo }}</td>
                        <td>{{ $proveedor->persona->ci_nit }}</td>
                        <td>{{ $proveedor->ciudad }}</td>
                        <td>
                            @can('proveedor ver')
                                <a href="{{ route('proveedores.show', [$proveedor->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('proveedor editar')
                                <a href="{{ route('proveedores.edit', [$proveedor->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('proveedor eliminar')
                                <form method="POST" action="{{ route('proveedores.destroy', [$proveedor->persona_id]) }}">
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

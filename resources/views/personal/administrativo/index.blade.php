@extends('layouts.app')

@section('page-title', 'Administrativo')

@section('navbar-logo', 'Havla - Administrativo')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Administrativo</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Administrativo</h3>
            @can('administrativo crear')
                <a href="{{ route('administrativos.create') }}" class="waves-effect waves-light btn-small green accent-3">
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
                    <th>Ci</th>
                    <th>Cargo</th>
                    <th>Inicio</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($administrativos as $administrativo)
                    <tr>
                        <td>{{ $administrativo->persona_id }}</td>
                        <td>{{ $administrativo->persona->nombre }}</td>
                        <td>{{ $administrativo->persona->direccion }}</td>
                        <td>
                            @foreach($administrativo->telefonos as $telefono)
                                <p>{{ $telefono->numero }}</p>
                            @endforeach
                        </td>
                        <td>{{ $administrativo->persona->activo === 1 ? "Si" : "No" }}</td>
                        <td>{{ $administrativo->persona->correo }}</td>
                        <td>{{ $administrativo->persona->ci_nit }}</td>
                        <td>{{ $administrativo->cargo }}</td>
                        <td>{{ $administrativo->inicio }}</td>
                        <td>
                            @can('administrativo ver')
                                <a href="{{ route('administrativos.show', [$administrativo->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('administrativo editar')
                                    <a href="{{ route('administrativos.edit', [$administrativo->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                                @endcan
                            @can('administrativo eliminar')
                                <form method="POST" action="{{ route('administrativos.destroy', [$administrativo->persona_id]) }}">
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

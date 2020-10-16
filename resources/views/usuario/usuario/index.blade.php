@extends('layouts.app')

@section('page-title', 'Usuario')

@section('navbar-logo', 'Havla - Usuario')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Usuario</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Gestionar Usuario</h3>
            <a href="{{ route('usuarios.create') }}" class="waves-effect waves-light btn-small green accent-3">
                <i class="material-icons right">add</i>Crear
            </a>
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->datos_personales['persona']->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ (empty($usuario->datos_personales['docente'])) ? $usuario->datos_personales['administrativo']->cargo : 'Docente' }}</td>

                        <td>
                            <a href="{{ route('usuarios.show', [$usuario->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            <a href="{{ route('usuarios.edit', [$usuario->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            <form method="POST" action="{{ route('usuarios.destroy', [$usuario->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small waves-effect waves-light" type="submit" name="action"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

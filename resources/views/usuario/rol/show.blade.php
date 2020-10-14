@extends('layouts.app')

@section('page-title', 'Rol')

@section('navbar-logo', 'Havla - Rol')

@section('breadcrumbs')
    <a href="{{ route('roles.index') }}" class="breadcrumb">Gestionar Rol</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <h3 class="center">Detalles del Rol</h3>
                <P class="white-text">ID: {{ $rol->id }}</P>
                <P class="white-text">Name: {{ $rol->name }}</P>
                @if(!empty($rol->permissions) && sizeof($rol->permissions) > 0)
                    <h4 class="center">Permisos</h4>
                    @foreach($rol->permissions as $permiso)
                        {{ $permiso->name }}<br>
                    @endforeach
                @endif
                @if(!empty($usuarios) && sizeof($usuarios) > 0)
                    <h4 class="center">Usuarios</h4>
                    <table class="striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

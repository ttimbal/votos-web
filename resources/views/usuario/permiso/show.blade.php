@extends('layouts.app')

@section('page-title', 'Permiso')

@section('navbar-logo', 'Havla - Permiso')

@section('breadcrumbs')
    <a href="{{ route('permisos.index') }}" class="breadcrumb">Gestionar Permiso</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $permiso->id }}</P>
                <P class="white-text">Nombre: {{ $permiso->name }}</P>
                @if(!empty($permiso->roles) && sizeof($permiso->roles) > 0)
                    <h4 class="center">Roles</h4>
                    @foreach($permiso->roles as $rol)
                        {{ $rol->name }}<br>
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

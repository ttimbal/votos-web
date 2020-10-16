@extends('layouts.app')

@section('page-title', 'Rol')

@section('navbar-logo', 'Havla - Rol')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Rol</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12 l12 xl10 offset-xl1">
            <div class="row">
                <h3 class="center">Gestionar Roles</h3>
                <div class="col s4">
                    <a href="{{ route('roles.create') }}" class="waves-effect waves-light btn-small green accent-3">
                        <i class="material-icons right">add</i>Crear
                    </a>
                </div>
                <div class="col s12 m12 l12 xl12">
                    <div class="card">
                        <table class="striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Permisos</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        @foreach($rol->permissions as $permission)
                                        {{ $permission->name }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.show', [$rol->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                                        <a href="{{ route('roles.edit', [$rol->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                                        <form method="POST" action="{{ route('roles.destroy', [$rol->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-small waves-effect" type="submit"><i class="material-icons">delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

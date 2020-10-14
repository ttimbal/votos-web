@extends('layouts.app')

@section('page-title', 'Permiso')

@section('navbar-logo', 'Havla - Permiso')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Permiso</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12 l12 xl10 offset-xl1">
            <div class="row">
                <h3 class="center">Gestionar Permiso</h3>
                <div class="col s4">
                    <a href="{{ route('permisos.create') }}" class="waves-effect waves-light btn-small green accent-3">
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
                                <th>Roles</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permisos as $permiso)
                                <tr>
                                    <td>{{ $permiso->id }}</td>
                                    <td>{{ $permiso->name }}</td>
                                    <td>
                                        @foreach($permiso->roles as $rol)
                                            {{ $rol->name }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('permisos.show', [$permiso->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                                        <a href="{{ route('permisos.edit', [$permiso->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                                        <form method="POST" action="{{ route('permisos.destroy', [$permiso->id]) }}">
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
{{--                    {{ $permisos->links('layouts.pagination') }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection

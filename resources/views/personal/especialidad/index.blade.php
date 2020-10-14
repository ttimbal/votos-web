@extends('layouts.app')

@section('page-title', 'Especialidad')

@section('navbar-logo', 'Havla - Especialidad')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Especialidad</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Registrar Especialidad</h3>
            @can('especialidad crear')
                <a href="{{ route('especialidades.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($especialidades as $especialidad)
                    <tr>
                        <td>{{ $especialidad->id }}</td>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>
                            @can('especialidad ver')
                                <a href="{{ route('especialidades.show', [$especialidad->id]) }}" class="waves-effect waves-light btn-small "><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('especialidad editar')
                                <a href="{{ route('especialidades.edit', [$especialidad->id]) }}" class="waves-effect waves-light btn-small "><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('especialidad eliminar')
                                <form method="POST" action="{{ route('especialidades.destroy', [$especialidad->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small waves-effect " type="submit"><i class="material-icons">delete</i></button>
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

@extends('layouts.app')

@section('page-title', 'Docente')

@section('navbar-logo', 'Havla - Docente')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar Docente</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12 l12 xl10 offset-xl1">
            <div class="row">
                <h3 class="center">Gestionar Docente</h3>
                @can('docente crear')
                    <div class="col s4">
                        <a href="{{ route('docentes.create') }}" class="waves-effect waves-light btn-small green accent-3">
                            <i class="material-icons right">add</i>Crear
                        </a>
                    </div>
                @endcan
                <div class="col s12 m12 l12 xl12">
                    <div class="card">
                        <table class="striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfonos</th>
                                <th>Activo</th>
                                <th>Especialidades</th>
                                <th>Correo</th>
                                <th>Ci</th>
                                <th>Fecha Inicio</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($docentes as $docente)
                                <tr>
                                    <td>{{ $docente->persona_id }}</td>
                                    <td>{{ $docente->persona->nombre }}</td>
                                    <td>{{ $docente->persona->direccion }}</td>
                                    <td>
                                        @foreach($docente->telefonos as $telefono)
                                            <p>{{ $telefono->numero }}</p>
                                        @endforeach
                                    </td>
                                    <td>{{ $docente->persona->activo === 1 ? "Si" : "No" }}</td>
                                    <td>
                                        @foreach($docente->especialidades as $especialidad)
                                            <p>{{ $especialidad->nombre }}</p>
                                        @endforeach
                                    </td>
                                    <td>{{ $docente->persona->correo }}</td>
                                    <td>{{ $docente->persona->ci_nit }}</td>
                                    <td>{{ $docente->inicio }}</td>
                                    <td>
                                        @can('docente ver')
                                            <a href="{{ route('docentes.show', [$docente->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                                        @endcan
                                        @can('docente editar')
                                                <a href="{{ route('docentes.edit', [$docente->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                                            @endcan
                                        @can('docente eliminar')
                                            <form method="POST" action="{{ route('docentes.destroy', [$docente->persona_id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-small waves-effect" type="submit"><i class="material-icons">delete</i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $docentes->links('layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection


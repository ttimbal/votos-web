@extends('layouts.app')

@section('page-title', 'Asistencia')

@section('navbar-logo', 'Havla - Asistencia')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Asistencia</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Registrar Asistencia</h3>
            @can('asistencia crear')
                <a href="{{ route('asistencias.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Persona</th>
                    <th>Cargo</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($asistencias as $asistencia)
                    <tr>
                        <td>{{ $asistencia->id }}</td>
                        <td>{{ $asistencia->fecha }}</td>
                        <td>
                            @switch($asistencia->estado)
                                @case('A')
                                {{ 'Asistencia' }}
                                @break
                                @case('P')
                                {{ 'Permiso' }}
                                @break
                                @case('F')
                                {{ 'Falta' }}
                                @break
                            @endswitch
                        </td>
                        <td>{{ $asistencia->persona->nombre }}</td>
                        <td>
                            @php
                                $tieneCargo = false;
                            @endphp
                            @foreach($administrativos as $administrativo)
                                @if($asistencia->persona->id === $administrativo->persona_id)
                                    @php
                                        $tieneCargo = true;
                                    @endphp
                                    {{ $administrativo->cargo }}
                                @endif
                            @endforeach
                            @if(!$tieneCargo)
                                {{ 'Docente' }}
                            @endif
                        </td>
                        <td>
                            @can('asistencia ver')
                                <a href="{{ route('asistencias.show', [$asistencia->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('asistencia editar')
                                <a href="{{ route('asistencias.edit', [$asistencia->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('asistencia eliminar')
                                <form method="POST" action="{{ route('asistencias.destroy', [$asistencia->id]) }}">
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

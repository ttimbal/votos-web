@extends('layouts.app')

@section('page-title', 'Usuario')

@section('navbar-logo', 'Havla - Usuario')

@section('breadcrumbs')
    <a href="{{ route('usuarios.index') }}" class="breadcrumb">Gestionar Usuario</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l12 l12 xl10 offset-xl1">
            <div class="row">
                <h3 class="center">Datos del Usuario</h3>
                <div class="col s12 m12 l12 xl12">
                    <div class="card-panel">
                        <P class="black-text">ID: {{ $usuario->id }}</P>
                        <P class="black-text">Nombre: {{ $usuario->name }}</P>
                        <P class="black-text">Direccion: {{ $persona->direccion }}</P>
                        <P class="black-text">Activo: {{ $persona->activo === 1 ? "Si" : "No" }}</P>
                        <P class="black-text">Correo: {{ $usuario->email }}</P>
                        <P class="black-text">Ci: {{ $persona->ci_nit }}</P>
                        <blockquote>
                            Permisos
                        </blockquote>
                        @foreach($usuario->permissions as $permiso)
                            <P class="black-text">* {{ $permiso->name }}</P>
                        @endforeach
                        <blockquote>
                            Roles
                        </blockquote>
                        @foreach($usuario->roles as $rol)
                            <P class="black-text">●{{ $rol->name }}</P>
                            <P class="black-text">permisos:</P>
                            @foreach($rol->permissions as $permiso)
                                <P class="black-text">* {{ $permiso->name }}</P>
                            @endforeach
                        @endforeach

{{--                        <table class="striped" cellspacing="0" width="100%">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Nombre</th>--}}
{{--                                <th>Dirección</th>--}}
{{--                                <th>Teléfonos</th>--}}
{{--                                <th>Activo</th>--}}
{{--                                <th>Especialidades</th>--}}
{{--                                <th>Correo</th>--}}
{{--                                <th>Ci</th>--}}
{{--                                <th>Fecha Inicio</th>--}}
{{--                                <th>Acción</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($docentes as $docente)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $docente->persona_id }}</td>--}}
{{--                                    <td>{{ $docente->persona->nombre }}</td>--}}
{{--                                    <td>{{ $docente->persona->direccion }}</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach($docente->telefonos as $telefono)--}}
{{--                                            <p>{{ $telefono->numero }}</p>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $docente->persona->activo === 1 ? "Si" : "No" }}</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach($docente->especialidades as $especialidad)--}}
{{--                                            <p>{{ $especialidad->nombre }}</p>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $docente->persona->correo }}</td>--}}
{{--                                    <td>{{ $docente->persona->ci_nit }}</td>--}}
{{--                                    <td>{{ $docente->inicio }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('docentes.show', [$docente->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>--}}
{{--                                        <a href="{{ route('docentes.edit', [$docente->persona_id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>--}}
{{--                                        <form method="POST" action="{{ route('docentes.destroy', [$docente->persona_id]) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button class="btn-small waves-effect" type="submit"><i class="material-icons">delete</i></button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

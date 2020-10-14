@extends('layouts.app')

@section('page-title', 'Administrativo')

@section('navbar-logo', 'Havla - Administrativo')

@section('breadcrumbs')
    <a href="{{ route('administrativos.index') }}" class="breadcrumb">Gestionar Administrativo</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $administrativo->persona_id }}</P>
                <P class="white-text">Nombre: {{ $administrativo->persona->nombre }}</P>
                <P class="white-text">Direccion: {{ $administrativo->persona->direccion }}</P>
                @for($contador = 1; $contador <= sizeof($administrativo->telefonos); $contador++)
                    <P class="white-text">{{ "Telefono ".$contador }} : {{ $administrativo->telefonos[$contador - 1]->numero }}</P>
                @endfor
                <P class="white-text">Activo: {{ $administrativo->persona->activo === 1? "Si" : "No"}}</P>
                <P class="white-text">Correo: {{ $administrativo->persona->correo }}</P>
                <P class="white-text">CI: {{ $administrativo->persona->ci_nit }}</P>
                <P class="white-text">Cargo: {{ $administrativo->cargo }}</P>
                <P class="white-text">Inicio: {{ $administrativo->inicio }}</P>
            </div>
        </div>
    </div>
@endsection

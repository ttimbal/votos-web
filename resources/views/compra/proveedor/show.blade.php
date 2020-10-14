@extends('layouts.app')

@section('page-title', 'Proveedor')

@section('navbar-logo', 'Havla - Proveedor')

@section('breadcrumbs')
    <a href="{{ route('proveedores.index') }}" class="breadcrumb">Gestionar Proveedores</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $proveedor->persona_id }}</P>
                <P class="white-text">Nombre: {{ $proveedor->persona->nombre }}</P>
                <P class="white-text">Direccion: {{ $proveedor->persona->direccion }}</P>
                @for($contador = 1; $contador <= sizeof($proveedor->telefonos); $contador++)
                    <P class="white-text">{{ "Telefono ".$contador }} : {{ $proveedor->telefonos[$contador - 1]->numero }}</P>
                @endfor
                <P class="white-text">Activo: {{ $proveedor->persona->activo === 1? "Si" : "No"}}</P>
                <P class="white-text">Correo: {{ $proveedor->persona->correo }}</P>
                <P class="white-text">CI: {{ $proveedor->persona->ci_nit }}</P>
                <P class="white-text">Ciudad: {{ $proveedor->ciudad }}</P>
            </div>
        </div>
    </div>
@endsection

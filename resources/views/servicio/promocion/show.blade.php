@extends('layouts.app')

@section('page-title', 'Promocion')

@section('navbar-logo', 'Havla - Promocion')

@section('breadcrumbs')
    <a href="{{ route('promociones.index') }}" class="breadcrumb">Gestionar Promoción</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">ID: {{ $promocion->id }}</P>
                <P class="white-text">Nombre: {{ $promocion->nombre }}</P>
                <P class="white-text">Fecha incio: {{ $promocion->fecha_inicio }}</P>
                <P class="white-text">Fecha fin: {{ $promocion->fecha_fin }}</P>
                <P class="white-text">Descuento: {{ $promocion->descuento }}%</P>
            </div>
        </div>
    </div>
@endsection

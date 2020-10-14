@extends('layouts.app')

@section('page-title', 'Almacen')

@section('navbar-logo', 'Havla - Almacen')

@section('breadcrumbs')
    <a href="{{ route('almacenes.index') }}" class="breadcrumb">Gestionar Alamacen</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">Codigo: {{ $almacen->codigo }}</P>
                <P class="white-text">Nombre: {{ $almacen->nombre }}</P>
                <P class="white-text">Ubicación: {{ $almacen->ubicacion }}</P>
            </div>
            <ul>
                @foreach($instrumentos as $instrumento)
                    <li> {{ $instrumento->nombre_instrumento->nombre }} </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

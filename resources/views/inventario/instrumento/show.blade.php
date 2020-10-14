@extends('layouts.app')

@section('page-title', 'Instrumento')

@section('navbar-logo', 'Havla - Instrumento')

@section('breadcrumbs')
    <a href="{{ route('instrumentos.index') }}" class="breadcrumb">Registrar Instrumento</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">Número: {{ $instrumento->numero }}</P>
                <P class="white-text">Nombre: {{ $instrumento->nombre_instrumento->nombre }}</P>
                <P class="white-text">Estado: {{ $instrumento->estado }}</P>
                <P class="white-text">Precio: {{ $instrumento->precio }}</P>
                @if($instrumento->disponibilidad === 0)
                    <P class="white-text">Disponible: No</P>
                @else
                    <P class="white-text">Disponible: Si</P>
                @endif
                <P class="white-text">Almacen Nombre: {{ $instrumento->almacen->nombre }}</P>
                <P class="white-text">Almacen Ubicación: {{ $instrumento->almacen->ubicacion }}</P>
                @foreach($compras as $compra)
                    @if($compra->numero === $instrumento->compra_numero)
                        @foreach($proveedores as $proveedor)
                            @if($compra->proveedor_id === $proveedor->persona_id)
                                <P class="white-text">Proveedor nombre: {{ $proveedor->persona->nombre }}</P>
                            @endif
                        @endforeach
                            <P class="white-text">Fecha de compra: {{ $compra->fecha }}</P>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

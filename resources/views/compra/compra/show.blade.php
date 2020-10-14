@extends('layouts.app')

@section('page-title', 'Compra')

@section('navbar-logo', 'Havla - Compra')

@section('breadcrumbs')
    <a href="{{ route('compras.index') }}" class="breadcrumb">Registrar Compra</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">Número: {{ $compra->numero }}</P>
                <P class="white-text">Fecha: {{ $compra->fecha }}</P>
            </div>
        </div>
    </div>
    <table class="striped centered">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compra->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->numero }}</td>
                    <td>{{ $detalle->nombre }}</td>
                    <td>{{ $detalle->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

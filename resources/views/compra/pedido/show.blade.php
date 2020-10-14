@extends('layouts.app')

@section('page-title', 'Pedido')

@section('navbar-logo', 'Havla - Pedido')

@section('breadcrumbs')
    <a href="{{ route('pedidos.index') }}" class="breadcrumb">Gestionar pedido</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <P class="white-text">Numero: {{ $pedido->numero }}</P>
                <P class="white-text">Proveedor: {{ $pedido->proveedor->nombre }}</P>
                <P class="white-text">Fecha: {{ $pedido->fecha }}</P>
            </div>
        </div>
    </div>
    <table class="striped centered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

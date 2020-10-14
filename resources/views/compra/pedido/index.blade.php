@extends('layouts.app')

@section('page-title', 'Pedido')

@section('navbar-logo', 'Havla - Pedido')

@section('breadcrumbs')
    <a class="breadcrumb">Gestionar pedido</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Pedidos</h3>
            @can('pedido crear')
                <a href="{{ route('pedidos.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->numero }}</td>
                        <td>{{ $pedido->fecha }}</td>
                        <td>{{ $pedido->proveedor->nombre }}</td>
                        <td>
                            @can('pedido ver')
                                <a href="{{ route('pedidos.show', [$pedido->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('pedido editar')
                                <a href="{{ route('pedidos.edit', [$pedido->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('pedido eliminar')
                                <form method="POST" action="{{ route('pedidos.destroy', [$pedido->numero]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small waves-effect waves-light" type="submit"><i class="material-icons">delete</i></button>
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

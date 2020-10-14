@extends('layouts.app')

@section('page-title', 'Compra')

@section('navbar-logo', 'Havla - Compra')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Compra</a>
@endsection

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="center">Compras</h3>
            @can('compra crear')
                <a href="{{ route('compras.create') }}" class="waves-effect waves-light btn-small green accent-3">
                    <i class="material-icons right">add</i>Crear
                </a>
            @endcan
            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Pedido</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->numero }}</td>
                        <td>{{ $compra->fecha }}</td>
                        <td>{{ $compra->proveedor->nombre }}</td>
                        <td>{{ $compra->pedido->numero }}</td>
                        <td>
                            @can('compra ver')
                                <a href="{{ route('compras.show', [$compra->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>
                            @endcan
                            @can('compra editar')
                                <a href="{{ route('compras.edit', [$compra->numero]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">edit</i></a><br>
                            @endcan
                            @can('compra eliminar')
                                <form method="POST" action="{{ route('compras.destroy', [$compra->numero]) }}">
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

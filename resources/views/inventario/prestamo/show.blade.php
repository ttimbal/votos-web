@extends('layouts.app')

@section('page-title', 'Prestamo')

@section('navbar-logo', 'Havla - Prestamo')

@section('breadcrumbs')
    <a href="{{ route('prestamos.index') }}" class="breadcrumb">Registrar Préstamo</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l10 offset-l1">
            <div class="card-panel grey center lighten-4">
                <h2 class="center">Préstamo</h2>

                <div class="row">
                    <div class="col s12 m12 l6 offset-l3">
                        <div class="card-panel white center lighten-4">
                            <p>ID: {{ $prestamo->id }}</p>
                            <p>Administrativo: {{ $administrativo->nombre }}</p>
                            <p>Cargo: {{ $administrativo->cargo }}</p>
                            <p>Cliente: {{ $cliente->nombre }}</p>
                            @if(empty($cliente->cargo))
                                <p>Cargo: Docente</p>
                            @else
                                <p>Cargo: {{ $cliente->cargo }}</p>
                            @endif
                            <p>Fecha: {{ $prestamo->fecha }}</p>
                            <p>Hora: {{ $prestamo->hora }}</p>
                        </div>
                    </div>
                </div>
                <h4 class="center">Detalles de prestamo</h4>
                <table class="striped highlight centered ">
                    <thead>
                    <tr>
                        <th>Numero de instrumento</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($instrumentosDelPrestamo as $instrumento)
                        <tr>
                            <td>{{ $instrumento->numero }}</td>
                            <td>{{ $instrumento->nombre }}</td>
                            <td>{{ $instrumento->estado }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('page-title', 'Reserva')

@section('navbar-logo', 'Havla - Reserva')

@section('breadcrumbs')
    <a href="{{ route('reservas.index') }}" class="breadcrumb">Registrar Reserva</a>
    <a class="breadcrumb">Show</a>
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 l10 offset-l1">
            <div class="card-panel grey lighten-4">
                <h2 class="center">Reserva</h2>
                <div class="row">
                    <div class="col s12 m12 l6 offset-l3">
                        <div class="card-panel white center lighten-4">
                            <p>ID: {{ $reserva->id }}</p>
                            <p>Docente: {{ $docente->nombre }}</p>
                            <p>Fecha: {{ $reserva->fecha }}</p>
                            <p>Hora: {{ $reserva->hora }}</p>
                            <p>Fecha a recoger: {{ $reserva->fecha_recoger }}</p>
                            <p>Hora a recoger: {{ $reserva->hora_recoger }}</p>
                        </div>
                    </div>
                </div>
                <h4 class="center">Detalles de Reserva</h4>
                <table class="striped highlight centered">
                    <thead>
                    <tr>
                        <th>Numero de instrumento</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($instrumentos as $instrumento)
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

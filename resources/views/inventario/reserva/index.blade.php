@extends('layouts.app')

@section('page-title', 'Reservas')

@section('navbar-logo', 'Havla - Reserva')

@section('breadcrumbs')
    <a class="breadcrumb">Registrar Reserva</a>
@endsection
@section('content')
    <div class="row">
        <div class="col s10 offset-s1">

            <h3 class="center">Reservas</h3>

            <a href="{{ route('reservas.create') }}" class="waves-effect waves-light btn-small green accent-3">
                <i class="material-icons right">add</i>Crear
            </a>

            <table class="responsive-table centered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->hora }}</td>
                        <td>

                                <a href="{{ route('reservas.show', [$reserva->id]) }}" class="waves-effect waves-light btn-small"><i class="material-icons">remove_red_eye</i></a><br>


                                <form method="POST" action="{{ route('reservas.destroy', [$reserva->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small waves-effect waves-light" type="submit" name="action"><i class="material-icons">delete</i></button>
                                </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

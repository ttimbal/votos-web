@extends('layouts.app')

@section('page-title', 'Horario')

@section('navbar-logo', 'Havla - Horario')

@section('breadcrumbs')
    <a href="{{ route('horarios.index') }}" class="breadcrumb">Gestionar Horario</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form class="col s12" method="POST" action="{{ route('horarios.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación</h3>
                    @foreach ($errors->all() as $message)
                        <p class="flow-text">{{ $message }}</p>
                    @endforeach
                    <div class="input-field col s12">
                        <select name="dia">
                            <option value="" disabled selected>Escoja un día</option>
                            @foreach($dias as $dia)
                                <option value="{{ $dia }}">{{ $dia }}</option>
                            @endforeach
                        </select>
                        <label>Día</label>
                    </div>

                    <div class="input-field col s6">
                        <input type="text" class="timepicker" name="hora_inicio">
                        <label>hora inicio</label>
                    </div>

                    <div class="input-field col s6">
                        <input type="text" class="timepicker" name="hora_fin">
                        <label>Hora fin</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

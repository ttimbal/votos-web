@extends('layouts.app')

@section('page-title', 'Periodo')

@section('navbar-logo', 'Havla - Periodo')

@section('breadcrumbs')
    <a href="{{ route('periodos.index') }}" class="breadcrumb">Gestionar Periodo</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('periodos.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="nombre" type="text" class="validate">
                                <label>Nombre</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input name="fecha_inicio" type="text" class="datepicker">
                                <label >Fecha inicio</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input name="fecha_fin" type="text" class="datepicker">
                                <label >Fecha Fin</label>
                            </div>
                        </div>

                        <button class="btn waves-effect waves-light" type="submit">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

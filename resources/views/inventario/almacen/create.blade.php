@extends('layouts.app')

@section('page-title', 'Almacen')

@section('navbar-logo', 'Havla - Almacen')

@section('breadcrumbs')
    <a href="{{ route('almacenes.index') }}" class="breadcrumb">Gestionar Alamacen</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('almacenes.store') }}">
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
                                <input id="nombre" name="nombre" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ubicacion" name="ubicacion" type="text" class="validate">
                                <label for="ubicacion">Ubicación</label>
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

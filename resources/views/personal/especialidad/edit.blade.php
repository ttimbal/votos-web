@extends('layouts.app')

@section('page-title', 'Especialidad')

@section('navbar-logo', 'Havla - Especialidad')

@section('breadcrumbs')
    <a href="{{ route('especialidades.index') }}" class="breadcrumb">Registrar Especialidad</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('especialidades.update', [$especialidad->id]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación</h3>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="nombre" type="text" class="validate" value="{{ empty(old('nombre')) ? $especialidad->nombre : old('nombre') }}">
                            <label>Nombre</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('nombre')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('page-title', 'Especialidad')

@section('navbar-logo', 'Havla - Especialidad')

@section('breadcrumbs')
    <a href="{{ route('especialidades.index') }}" class="breadcrumb">Registrar Especialidad</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('especialidades.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación</h3>
{{--                    @foreach ($errors->all() as $message)--}}
{{--                        <p class="flow-text">{{ $message }}</p>--}}
{{--                    @endforeach--}}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre" name="nombre" type="text" class="validate" value="{{ old('nombre') }}">
                            <label for="nombre">Nombre</label>
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

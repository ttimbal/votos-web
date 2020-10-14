@extends('layouts.app')

@section('page-title', 'Curso')

@section('navbar-logo', 'Havla - Curso')

@section('breadcrumbs')
    <a href="{{ route('cursos.index') }}" class="breadcrumb">Gestionar Cursos Ofertados</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('cursos.update', [$curso->codigo]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3>Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="validate" name="nombre" value="{{ $curso->nombre }}" required>
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="validate" name="duracion" value="{{ $curso->duracion }}" required>
                                <label>Duración(años)</label>
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

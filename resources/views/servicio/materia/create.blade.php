@extends('layouts.app')

@section('page-title', 'Materia')

@section('navbar-logo', 'Havla - Materia')

@section('breadcrumbs')
    <a href="{{ route('materias.index') }}" class="breadcrumb">Gestionar Materia</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('materias.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12">
                            <input name="sigla" type="text" class="validate">
                            <label>Sigla</label>
                        </div>

                        <div class="input-field col s12">
                            <input name="nombre" type="text" class="validate">
                            <label>Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="precio" type="text" class="validate">
                            <label>Precio (Bs.)</label>
                        </div>

                        <div class="input-field col s12">
                            <select multiple name="cursos_codigos[]">
                                <option value="" disabled>Seleccione un curso</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->codigo }}">{{ $curso->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Cursos</label>
                        </div>

                        <div class="input-field col s12">
                            <select multiple name="promociones_id[]">
                                <option value="" disabled>Seleccionar promociones</option>
                                @foreach($promociones as $promocion)
                                    <option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Promociones</label>
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

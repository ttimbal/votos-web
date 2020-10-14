@extends('layouts.app')

@section('page-title', 'Materia')

@section('navbar-logo', 'Havla - Materia')

@section('breadcrumbs')
    <a href="{{ route('materias.index') }}" class="breadcrumb">Gestionar Materia</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('materias.update', [$materia->sigla]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de edición</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12">
                            <input name="sigla" type="text" class="validate" value="{{ $materia->sigla }}">
                            <label>Sigla</label>
                        </div>

                        <div class="input-field col s12">
                            <input name="nombre" type="text" class="validate" value="{{ $materia->nombre }}">
                            <label>Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="precio" type="text" class="validate" value="{{ $materia->precio }}">
                            <label>Precio (Bs.)</label>
                        </div>

                        <div class="input-field col s12">
                            <select multiple name="cursos_codigos[]">
                                @foreach($cursos as $curso)
                                    @php
                                        $seleccionado = false;
                                    @endphp
                                    @foreach($carreras_materia as $carrera_materia)
                                        @if($carrera_materia->codigo === $curso->codigo)
                                            @php
                                                $seleccionado = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($seleccionado)
                                        <option value="{{ $curso->codigo }}" selected>{{ $curso->nombre }}</option>
                                    @else
                                        <option value="{{ $curso->codigo }}">{{ $curso->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label>Cursos</label>
                        </div>

                        <div class="input-field col s12">
                            <select multiple name="promociones_id[]">
                                <option value="" disabled>Seleccionar promociones</option>
                                @foreach($promociones as $promocion)
                                    @php
                                        $seleccionado = false;
                                    @endphp
                                    @foreach($promociones_materia as $promocion_materia)
                                        @if($promocion_materia->id === $promocion->id)
                                            @php
                                                $seleccionado = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($seleccionado)
                                        <option value="{{ $promocion->id }}" selected>{{ $promocion->nombre }}</option>
                                    @else
                                        <option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>
                                    @endif
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

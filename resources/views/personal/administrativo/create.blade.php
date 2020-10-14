@extends('layouts.app')

@section('page-title', 'Administrativo')

@section('navbar-logo', 'Havla - Administrativo')

@section('breadcrumbs')
    <a href="{{ route('administrativos.index') }}" class="breadcrumb">Gestionar Administrativo</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('administrativos.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center-align">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="nombre" name="nombre" type="text" class="validate" value="{{ old('nombre') }}">
                                <label for="nombre">Nombre</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('nombre')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-field col s6">
                                <input id="direccion" name="direccion" type="text" class="validate" value="{{ old('direccion') }}">
                                <label for="direccion">Dirección</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('direccion')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div id="lista-telefonos">
                            @if(empty(old('telefonos')))
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="telefono" name="telefonos[]" type="number" class="validate">
                                        <label for="telefono">Teléfono</label>
                                        <span class="helper-text" data-error="incorrecto" data-success="correcto"></span>
                                    </div>
                                </div>
                            @else
                                @for ($i = 0; $i < sizeof(old('telefonos')); $i++)
                                    @php
                                        $identificador = "telefonos.".$i;
                                    @endphp
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="telefono" name="telefonos[]" type="number" class="validate" value="{{ old($identificador) }}">
                                            <label for="telefono">Teléfono</label>
                                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                            @error($identificador)
                                                {{ $message }}
                                                @enderror
                                        </span>
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <a class="waves-effect waves-light btn-small" id="add_telefono"><i class="material-icons right">add</i>Telefono</a>
                        <p>
                            <label>
                                <input type="checkbox" id="activo" name="activo" class="filled-in" {{ empty(old('activo')) ? '' : 'checked' }}/>
                                <span>Activo</span>
                            </label>
                        </p>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="correo" name="correo" type="email" class="validate" value="{{ old('correo') }}">
                                <label for="correo">Correo</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('correo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-field col s6">
                                <input id="ci_nit" name="ci_nit" type="number" class="validate" value="{{ old('ci_nit') }}">
                                <label for="ci_nit">Carnet de identidad</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('ci_nit')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        @error('cargo')
                        <p>{{ $message }}</p>
                        @enderror
                        <div class="row">
                            <div class="input-field col s6 row">
                                <select name="cargo">
                                    <option value="" disabled selected>Escoge una opción</option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{ $cargo }}" {{ empty(old('cargo')) ? '' : ((old('cargo') == $cargo ) ? 'selected' : '' ) }}>{{ $cargo }}</option>
                                    @endforeach
                                </select>
                                <label>Cargo</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="inicio" name="inicio" type="text" class="datepicker validate" value="{{ old('inicio') }}">
                                <label for="inicio">Fecha inicio</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('inicio')
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
    </div>
@endsection

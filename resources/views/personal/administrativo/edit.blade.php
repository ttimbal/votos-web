@extends('layouts.app')

@section('page-title', 'Administrativo')

@section('navbar-logo', 'Havla - Administrativo')

@section('breadcrumbs')
    <a href="{{ route('administrativos.index') }}" class="breadcrumb">Gestionar Administrativo</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('administrativos.update', [$administrativo->persona_id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center-align">Formulario de edición</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="nombre" name="nombre" type="text" class="validate" value="{{ empty(old('nombre')) ? $administrativo->persona->nombre : old('nombre') }}">
                                <label for="nombre">Nombre</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('nombre')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-field col s6">
                                <input id="direccion" name="direccion" type="text" class="validate" value="{{ empty(old('direccion')) ? $administrativo->persona->direccion : old('direccion') }}">
                                <label for="direccion">Dirección</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('direccion')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div id="lista-telefonos">
                            @for($i = 0; (empty(old('telefonos'))) ? $i < sizeof($administrativo->telefonos) : ($i < sizeof(old('telefonos'))); $i++)
                                @php
                                    $identificador = "telefonos.".$i;
                                @endphp
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="telefono" name="telefonos[]" type="number" class="validate" value="{{ empty(old($identificador)) ? $administrativo->telefonos[$i]->numero : old($identificador) }}">
                                        <label for="telefono">Telefono</label>
                                        <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                        @error($identificador)
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                    @if($i != 0)
                                        <a class="btn-floating btn-small waves-effect waves-light red remover_telefono"><i class="material-icons">remove</i></a>
                                    @endif
                                </div>
                            @endfor
                        </div>
                        <a class="waves-effect waves-light btn-small" id="add_telefono"><i class="material-icons right">add</i>Telefono</a>
                        <p>
                            <label>
                                <input type="checkbox" id="activo" name="activo" class="filled-in" {{ empty($errors->all()) ? ($administrativo->persona->activo != 0 ? "checked" : "") : (old('activo') == 'on' ? "checked" : "") }} />
                                <span>Activo</span>
                            </label>
                        </p>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="correo" name="correo" type="email" class="validate" value="{{ empty(old('correo')) ? $administrativo->persona->correo : old('correo') }}">
                                <label for="correo">Correo</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('correo')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-field col s6">
                                <input id="ci_nit" name="ci_nit" type="number" class="validate" value="{{ empty(old('ci_nit')) ? $administrativo->persona->ci_nit : old('ci_nit') }}">
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
                                <select name="cargo" id="cargo">
                                    @foreach($cargos as $cargo)
                                        <option value="{{ $cargo }}" {{ empty(old('cargo')) ? ($administrativo->cargo === $cargo ? 'selected' : '') : ($cargo === old('cargo') ? 'selected' : '' ) }}>{{ $cargo }}</option>
                                    @endforeach
                                </select>
                                <label>Cargo</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="inicio" name="inicio" type="text" class="datepicker validate" value="{{ empty(old('inicio')) ? $administrativo->inicio : old('inicio') }}">
                                <label for="inicio">Fecha inicio</label>
                                <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                    @error('inicio')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        cantidad_actual_telefonos = {{ sizeof($administrativo->telefonos) }}
    </script>
@endpush

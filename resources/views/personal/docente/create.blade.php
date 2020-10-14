@extends('layouts.app')

@section('page-title', 'Docente')

@section('navbar-logo', 'Havla - Docente')

@section('breadcrumbs')
    <a href="{{ route('docentes.index') }}" class="breadcrumb">Gestionar Docente</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('docentes.store') }}">
        @csrf
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación de Docente</h3>
{{--                    @foreach ($errors->all() as $message)--}}
{{--                        <p class="flow-text">{{ $message }}</p>--}}
{{--                    @endforeach--}}
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
                    @error('especialidades')
                    <p>{{ $message }}</p>
                    @enderror
                    <div id="lista-selects" class="row">
                        @if(old('especialidades') != null)
                            @for($i = 0; $i < sizeof(old('especialidades')); $i++)
                                @php
                                    $identificador = 'especialidades.'.$i;
                                @endphp
                                <div class="input-field col s12 row">
                                    <select name="especialidades[]">
                                        <option value="" disabled selected>Escoge una opción</option>
                                        @foreach($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}" {{ (old($identificador) == $especialidad->id ) ? 'selected' : '' }}>{{ $especialidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label>Especialidad</label>
                                    @if($i != 0)
                                        <a class="btn-floating btn-small waves-effect waves-light red remover_select"><i class="material-icons">remove</i></a>
                                    @endif
                                </div>
                            @endfor
                        @else
                            <div class="input-field col s12 row">
                                <select name="especialidades[]">
                                    <option value="" disabled selected>Escoge una opción</option>
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Especialidad</label>
                            </div>
                        @endif

                    </div>
                    <a class="waves-effect waves-light btn-small" onclick="setTimeout('inicializarselect()',0);" id="add_select"><i class="material-icons right">add</i>Especialidad</a>
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
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="inicio" name="inicio" type="text" class="datepicker validate" value="{{ old('inicio') }}">
                            <label for="inicio">Fecha de inicio</label>
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
@endsection

@push('scripts')
    <script>

        @error('telefonos.*')
            //seteo la cantidad actual de telefonos
            cantidad_actual_telefonos = {{ sizeof(old('telefonos')) }};
        @enderror
        @if(old('especialidades') != null)
            // seteo tambien la cantidad de especialidades actuales
            cantidad_actual_especialidades = {{ count(old('especialidades')) }}
        @endif

        $("#add_select").click(function (e) {
            e.preventDefault(); //prevenir novos clicks
            if (cantidad_actual_especialidades < cantidad_max_especialidades) {
                $("#lista-selects").append(
                    '<div class="input-field col s12 row">\
                        <select name="especialidades[]">\
                            <option value="" disabled selected>Escoge una opción</option>\
                        @foreach($especialidades as $especialidad)\
                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>\
                        @endforeach\
                    </select>\
                    <label>Especialidad</label>\
                    <a class="btn-floating btn-small waves-effect waves-light red remover_select"><i class="material-icons">remove</i></a>\
                </div>'
                );
                cantidad_actual_especialidades++;
                M.AutoInit();
            }
        });

    </script>
@endpush

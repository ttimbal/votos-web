@extends('layouts.app')

@section('page-title', 'Docente')

@section('navbar-logo', 'Havla - Docente')

@section('breadcrumbs')
    <a href="{{ route('docentes.index') }}" class="breadcrumb">Gestionar Docente</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('docentes.update', [$docente->persona_id]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="card-panel purple grey lighten-4">
                    <h3 class="center">Formulario de edición</h3>
{{--                    @foreach ($errors->all() as $message)--}}
{{--                        <p class="flow-text">{{ $message }}</p>--}}
{{--                    @endforeach--}}
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nombre" name="nombre" type="text" class="validate" value="{{ (empty(old('nombre'))) ? $docente->persona->nombre : old('nombre') }}">
                            <label for="nombre">Nombre</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('nombre')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field col s6">
                            <input id="direccion" name="direccion" type="text" class="validate" value="{{ (empty(old('direccion'))) ? $docente->persona->direccion : old('direccion') }}">
                            <label for="direccion">Dirección</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('direccion')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div id="lista-telefonos">
                        @for($i = 0; (empty(old('telefonos'))) ? $i < sizeof($docente->telefonos) : ($i < sizeof(old('telefonos'))); $i++)
                            @php
                                $identificador = "telefonos.".$i;
                            @endphp
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="telefono" name="telefonos[]" type="number" class="validate" value="{{ (empty(old($identificador))) ? $docente->telefonos[$i]->numero : old($identificador) }}">
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
                            <input type="checkbox" id="activo" name="activo" class="filled-in" {{ (empty(old('activo'))) ? ($docente->persona->activo === 1 ? "checked" : "") : (old('activo') == 'on' ? "checked" : "") }} />
                            <span>Activo</span>
                        </label>
                    </p>
                    @error('especialidades')
                    <p>{{ $message }}</p>
                    @enderror
                    <!-- Primero se revisa la especialidad de la persona actual y luego se revisan todas las especialidades en general -->
                    <div id="lista-selects" class="row">
                        @for($i = 0; (empty(old('especialidades'))) ? ($i < sizeof($docente->especialidades)) : ($i < sizeof(old('especialidades'))) ; $i++)
                            @php
                                $identificador = 'especialidades.'.$i;
                            @endphp
                            <div class="input-field col s7 row">
                                <select name="especialidades[]">
                                    @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}" {{ (empty(old($identificador))) ? (($docente->especialidades[$i]->id == $especialidad->id)? 'selected' : '') : ((old($identificador) == $especialidad->id ) ? 'selected' : '') }}>{{ $especialidad->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Especialidad</label>
                                @if($i != 0)
                                    <a class="btn-floating btn-small waves-effect waves-light red remover_select"><i class="material-icons">remove</i></a>
                                @endif
                            </div>
                        @endfor
                    </div>
                    <a class="waves-effect waves-light btn-small" onclick="setTimeout('inicializarselect()',0);" id="add_select"><i class="material-icons right">add</i>Especialidad</a>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="correo" name="correo" type="text" class="validate" value="{{ (empty(old('correo'))) ? $docente->persona->correo : old('correo') }}">
                            <label for="correo">Correo</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('correo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field col s6">
                            <input id="ci_nit" name="ci_nit" type="text" class="validate" value="{{ (empty(old('ci_nit'))) ? $docente->persona->ci_nit : old('ci_nit') }}">
                            <label for="ci_nit">Carnet de identidad</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                @error('ci_nit')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="inicio" name="inicio" type="text" class="datepicker" value="{{ (empty(old('inicio'))) ? $docente->inicio : old('inicio') }}">
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
@endsection

@push('scripts')
    <script>

        //seteo la cantidad actual de telefonos
        @if($errors->has('telefonos.*'))
            cantidad_actual_telefonos = {{ sizeof(old('telefonos')) }}
        @else
            cantidad_actual_telefonos = {{ sizeof($docente->telefonos) }};
        @endif

        // seteo tambien la cantidad de especialidades actuales
        @if(empty(old('especialidades')))
            cantidad_actual_especialidades = {{ sizeof($docente->especialidades) }}
        @else
            cantidad_actual_especialidades = {{ count(old('especialidades')) }}
        @endif


        $("#add_select").click(function (e) {
            e.preventDefault(); //prevenir novos clicks
            if (cantidad_actual_especialidades < cantidad_max_especialidades) {
                $("#lista-selects").append(
                    '<div class="input-field col s7 row">\
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
            }
        });
    </script>
@endpush

@extends('layouts.app')

@section('page-title', 'Prestamo')

@section('navbar-logo', 'Havla - Prestamo')

@section('breadcrumbs')
    <a href="{{ route('prestamos.index') }}" class="breadcrumb">Registrar Préstamo</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('prestamos.update', [$prestamo->id]) }}">
            @csrf
            @method('PUT')

            <div class="col col s12 m12 l10 offset-l1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de edición</h3>
                    @foreach ($errors->all() as $message)
                        <p class="flow-text">{{ $message }}</p>
                    @endforeach

                    <div class="input-field col s12">
                        <select name="encargadoDeAlmacen">
                            <option value="{{ $administrativoQueAtiende->id }}" selected>{{ $administrativoQueAtiende->nombre }}</option>
                        </select>
                        <label>Encargado De Almacen</label>
                    </div>

                    <div class="input-field col s12">
                        <select name="cliente_id">
                            <option value="{{ $clientePersona->id }}">{{ $clientePersona->nombre }}</option>
                        </select>
                        <label>Cliente</label>
                    </div>
                    <div class="col s12">
                        <blockquote>
                            Detalle de prestamo:
                        </blockquote>
                    </div>
                    <div id="lista-selects">
                        @php
                            $poneBotonEliminar = false;
                        @endphp
                        @foreach($instrumentosPrestados as $instrumentosPrestado)
                            <div>
                                <div class="input-field col s7">
                                    <select name="instrumentos_id[]">
                                        @php
                                            $i = 0;
                                            $cantidadTotal = count($todosLosInstrumentosDisponibles);
                                            $nombreInstrumento = '';
                                        @endphp
                                        @while($i < $cantidadTotal)
                                            @if($nombreInstrumento === $todosLosInstrumentosDisponibles[$i]->nombre)
                                                <option value="{{ $todosLosInstrumentosDisponibles[$i]->numero }}" {{ $todosLosInstrumentosDisponibles[$i]->numero === $instrumentosPrestado->numero ? 'selected' : '' }}>{{ 'id: '.$todosLosInstrumentosDisponibles[$i]->numero.' nombre: '.$todosLosInstrumentosDisponibles[$i]->nombre }}</option>
                                                @php
                                                    $i++;
                                                @endphp
                                            @else
                                                @php
                                                    $nombreInstrumento = $todosLosInstrumentosDisponibles[$i]->nombre;
                                                @endphp
                                                <optgroup label="{{ $nombreInstrumento }}">
                                                </optgroup>
                                            @endif
                                        @endwhile
                                    </select>
                                    <label>Instrumento</label>
                                </div>

                                <div class="input-field col s4">
                                    <select name="estadoInstrumentos[]">
                                        <option value="" disabled selected>Seleccionar estado</option>
                                        @foreach($todosLosEstados as $estadoInstrumento)
                                            <option value="{{ $estadoInstrumento }}" {{ $estadoInstrumento === $instrumentosPrestado->estado ? 'selected' : '' }}>{{ $estadoInstrumento }}</option>
                                        @endforeach
                                    </select>
                                    <label>Estado</label>
                                </div>
                                <br>
                                <br>
                                @if($poneBotonEliminar)
                                    <a class="waves-effect waves-light btn-small remover_select">Eliminar</a>
                                @else
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                @endif
                                <br>
                                <br>
                            </div>
                            @php
                                $poneBotonEliminar = true;
                            @endphp
                        @endforeach
                    </div>

                    <a class="waves-effect waves-light btn-small" onclick="setTimeout('inicializarselect()',0);" id="add_select"><i class="material-icons right">add</i>Instrumento</a>
                    <button class="btn-small waves-effect waves-light red" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $("#add_select").click(function (e) {--}}
{{--            e.preventDefault(); //prevenir novos clicks--}}
{{--            $("#lista-selects").append(--}}
{{--                '<div class="12">\--}}
{{--                    <div class="input-field col s7">\--}}
{{--                        <select name="instrumentos_numero[]" class="row">\--}}
{{--                            <option value="" disabled selected>Seleccionar instrumento</option>\--}}
{{--                            @foreach($instrumentos as $instrumento)--}}
{{--                                <option value="{{ $instrumento->numero }}" {{ $detalle->numero_instrumento === $instrumento->numero ? 'selected' : '' }}>{{ 'id: '.$instrumento->numero.' nombre: '.$instrumento->nombre->nombre }}</option>\--}}
{{--                            @endforeach\--}}
{{--                        </select>\--}}
{{--                        <label>Instrumento</label>\--}}
{{--                    </div>\--}}
{{--                    <div class="input-field col s4">\--}}
{{--                        <select name="estados[]">\--}}
{{--                            @foreach($estadoInstrumentos as $estadoInstrumento)\--}}
{{--                                <option value="{{ $estadoInstrumento }}" {{ $detalle->estado === $estadoInstrumento ? 'selected' : '' }}>{{ $estadoInstrumento }}</option>\--}}
{{--                            @endforeach\--}}
{{--                        </select>\--}}
{{--                        <label>Estado</label>\--}}
{{--                    </div>\--}}
{{--                    <br>\--}}
{{--                    <br>\--}}
{{--                    <a class="waves-effect waves-light btn-small remover_select">Eliminar</a>\--}}
{{--                    <br>\--}}
{{--                    <br>\--}}
{{--                </div>'--}}
{{--            );--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

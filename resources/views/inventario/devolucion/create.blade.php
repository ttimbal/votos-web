@extends('layouts.app')

@section('page-title', 'Devolución')

@section('navbar-logo', 'Havla - Devolución')

@php
    use App\Http\Controllers\DetallePrestamoController;
    use App\Http\Controllers\AdministrativoController;
@endphp

@section('breadcrumbs')
    <a href="{{ route('devoluciones.index') }}" class="breadcrumb">Registrar Devolución</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('prestamos.store') }}">
            @csrf

            <h3>Formulario de creación</h3>
            <div class="input-field col s12">
                <select name="encargado_de_almacen">
                    <option value="" disabled selected>Seleccionar encargado</option>
                    @foreach($datos['administrativos'] as $administrativo)
                        @if($administrativo->cargo === AdministrativoController::$ENCARGADO_DE_ALMACEN)
                            <option value="{{ $administrativo->persona_id }}">{{ $administrativo->persona->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <label>Encargado de Almacen</label>
            </div>
            <div class="input-field col s12">
                <select name="cliente">
                    <option value="" disabled selected>Seleccionar cliente</option>
                    @foreach($datos['docentes'] as $docente)
                        <option value="{{ $docente->persona_id }}">{{ $docente->persona->nombre.' - Docente' }}</option>
                    @endforeach
                    @foreach($datos['administrativos'] as $administrativo)
                        @if($administrativo->cargo != AdministrativoController::$ENCARGADO_DE_ALMACEN)
                            <option value="{{ $administrativo->persona_id }}">{{ $administrativo->persona->nombre . ' - ' .$administrativo->cargo  }}</option>
                        @endif
                    @endforeach
                </select>
                <label>Cliente</label>
                <blockquote>
                    Detalle
                </blockquote>
            </div>

            <div id="lista-selects">
                <div class="12">
                    <div class="input-field col s8">
                        <select name="instrumentos[]" class="row">
                            <option value="" disabled selected>Seleccionar instrumento</option>
                            @foreach($datos['instrumentos'] as $instrumento)
                                <option value="{{ $instrumento->numero }}">{{ 'id: '.$instrumento->numero.' nombre: '.$instrumento->nombre->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Instrumento</label>
                    </div>
                    <div class="input-field col s4">
                        <select name="estados[]">
                            <option value="" disabled selected>Seleccionar estado</option>
                            <option value="{{ DetallePrestamoController::$RECIEN_FABRICADO }}">{{ DetallePrestamoController::$RECIEN_FABRICADO }}</option>
                            <option value="{{ DetallePrestamoController::$CASI_NUEVO }}">{{ DetallePrestamoController::$CASI_NUEVO }}</option>
                            <option value="{{ DetallePrestamoController::$ALGO_DESGASTADO }}">{{ DetallePrestamoController::$ALGO_DESGASTADO }}</option>
                            <option value="{{ DetallePrestamoController::$BASTANTE_DESGASTADO }}">{{ DetallePrestamoController::$BASTANTE_DESGASTADO }}</option>
                            <option value="{{ DetallePrestamoController::$DEPLORABLE }}">{{ DetallePrestamoController::$DEPLORABLE }}</option>
                            <option value="{{ DetallePrestamoController::$NO_FUNCIONA }}">{{ DetallePrestamoController::$NO_FUNCIONA }}</option>
                        </select>
                        <label>Estado</label>
                    </div>
                </div>
            </div>

            <a class="waves-effect waves-light btn-small" onclick="setTimeout('inicializarselect()',0);" id="add_select"><i class="material-icons right">add</i>Instrumento</a>
            <button class="btn waves-effect waves-light" type="submit">Enviar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
@endsection

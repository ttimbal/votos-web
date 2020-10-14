@extends('layouts.app')

@section('page-title', 'Instrumento')

@section('navbar-logo', 'Havla - Instrumento')

@section('breadcrumbs')
    <a href="{{ route('instrumentos.index') }}" class="breadcrumb">Registrar Instrumento</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('instrumentos.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12">
                            <select name="nombreInstrumento_id">
                                <option value="" disabled selected>Seleccione un Nombre</option>
                                @foreach($nombre_instrumentos as $nombre_instrumento)
                                    <option value="{{ $nombre_instrumento->id }}">{{ $nombre_instrumento->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Nombre Instrumento</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="estado">
                                <option value="" disabled selected>Seleccione un Estado</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endforeach
                            </select>
                            <label>Estado</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="precio" class="validate">
                            <label for="first_name">Precio(bs.)</label>
                        </div>
                        <p>
                            <label>
                                <input name="disponibilidad" type="checkbox" />
                                <span>Disponibilidad</span>
                            </label>
                        </p>
                        <div class="input-field col s12">
                            <select name="almacen_codigo">
                                <option value="" disabled selected>Seleccione un almacen</option>
                                @foreach($almacenes as $almacen)
                                    <option value="{{ $almacen->codigo }}">{{ $almacen->nombre.' - '.$almacen->ubicacion }}</option>
                                @endforeach
                            </select>
                            <label>Almacen</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="compra_numero">
                                <option value="" disabled selected>Seleccione una Compra</option>
                                @foreach($compras as $compra)
                                    @foreach($proveedores as $proveedor)
                                        @if($proveedor->persona_id === $compra->proveedor_id)
                                            <option value="{{ $compra->numero }}">{{ $proveedor->persona->nombre.' - '.$compra->fecha }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                            <label>Compra</label>
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

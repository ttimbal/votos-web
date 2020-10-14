@extends('layouts.app')

@section('page-title', 'Instrumento')

@section('navbar-logo', 'Havla - Instrumento')

@section('breadcrumbs')
    <a href="{{ route('instrumentos.index') }}" class="breadcrumb">Registrar Instrumento</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('instrumentos.update', [$instrumento->numero]) }}">
            @csrf
            @method('PUT')

            <h3>Formulario de edición</h3>
            @foreach ($errors->all() as $message)
                <p class="flow-text">{{ $message }}</p>
            @endforeach
            <div class="input-field col s12">
                <select name="nombreInstrumento_id">
                    @foreach($nombre_instrumentos as $nombre_instrumento)
                        <option value="{{ $nombre_instrumento->id }}" {{ $instrumento->nombre_instrumento_id === $nombre_instrumento->id ? 'selected' : '' }}>{{ $nombre_instrumento->nombre }}</option>
                    @endforeach
                </select>
                <label>Nombre Instrumento</label>
            </div>
            <div class="input-field col s12">
                <select name="estado">
                    @foreach($estados as $estado)
                        <option value="{{ $estado }}">{{ $estado }}</option>
                    @endforeach
                </select>
                <label>Estado</label>
            </div>
            <div class="input-field col s12">
                <select name="almacen_codigo">
                    @foreach($almacenes as $almacen)
                        <option value="{{ $almacen->codigo }}" {{ $instrumento->almacen_codigo === $almacen->codigo ? 'selected' : '' }}>{{ $almacen->nombre.' - '.$almacen->ubicacion }}</option>
                    @endforeach
                </select>
                <label>Almacen</label>
            </div>

            <button class="btn waves-effect waves-light" type="submit">Enviar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
@endsection

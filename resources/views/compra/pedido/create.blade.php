@extends('layouts.app')

@section('page-title', 'Pedido')

@section('navbar-logo', 'Havla - Pedido')

@section('breadcrumbs')
    <a href="{{ route('pedidos.index') }}" class="breadcrumb">Gestionar pedido</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('pedidos.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="input-field col s12 row">
                            <select name="proveedor">
                                <option value="" disabled selected>Escoge una opción</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->persona_id }}">{{ $proveedor->persona->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Proveedor</label>
                            <blockquote>
                                Detalle
                            </blockquote>
                        </div>

                        <div id="lista-selects">
                            <div class="12">
                                <div class="input-field col s7">
                                    <select name="nombreInstrumentos_id[]" class="row">
                                        <option value="" disabled selected>Escoge una opción</option>
                                        @foreach($nombreInstrumentos as $instrumento)
                                            <option value="{{ $instrumento->id }}">{{ $instrumento->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label>Instrumento</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="last_name" type="text" name="cantidades[]" class="validate">
                                    <label for="last_name">Cantidad</label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>

                        <a class="waves-effect waves-light btn-small" onclick="setTimeout('inicializarselect()',0);" id="add_select"><i class="material-icons right">add</i>Instrumento</a>
                        <div>
                            <button class="btn waves-effect waves-light red" type="submit">Enviar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $("#add_select").click(function (e) {
            e.preventDefault(); //prevenir novos clicks
            $("#lista-selects").append(
                '<div class="12">\
                    <div class="input-field col s7">\
                        <select name="nombreInstrumentos_id[]" class="row">\
                            <option value="" disabled selected>Escoge una opción</option>\
                            @foreach($nombreInstrumentos as $instrumento)\
                                <option value="{{ $instrumento->id }}">{{ $instrumento->nombre }}</option>\
                            @endforeach\
                        </select>\
                        <label>Instrumento</label>\
                    </div>\
                    <div class="input-field col s4">\
                        <input id="last_name" type="text" name="cantidades[]" class="validate">\
                        <label for="last_name">Cantidad</label>\
                    </div>\
                    <br>\
                    <br>\
                    <a class="waves-effect waves-light btn-small remover_select">Eliminar</a>\
                    <br>\
                    <br>\
                </div>'
            );
        });
    </script>
@endpush

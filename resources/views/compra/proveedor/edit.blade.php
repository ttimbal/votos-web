@extends('layouts.app')

@section('page-title', 'Proveedor')

@section('navbar-logo', 'Havla - Proveedor')

@section('breadcrumbs')
    <a href="{{ route('proveedores.index') }}" class="breadcrumb">Gestionar Proveedores</a>
    <a class="breadcrumb">Edit</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('proveedores.update', [$proveedor->persona_id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de edición</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="nombre" name="nombre" type="text" class="validate" value="{{ $proveedor->persona->nombre }}">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="direccion" name="direccion" type="text" class="validate" value="{{ $proveedor->persona->direccion }}">
                                <label for="direccion">Dirección</label>
                            </div>
                        </div>

                        <div id="lista-telefonos">
                            @foreach($proveedor->telefonos as $telefono)
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="telefono" name="telefonos[]" type="text" class="validate" value="{{ $telefono->numero }}">
                                        <label for="telefono">Telefono</label>
                                    </div>
                                    <a class="btn-floating btn-small waves-effect waves-light red remover_telefono"><i class="material-icons">remove</i></a>
                                </div>
                            @endforeach
                        </div>
                        <a class="waves-effect waves-light btn-small" id="add_telefono"><i class="material-icons right">add</i>Telefono</a>

                        <p>
                            <label>
                                <input type="checkbox" id="activo" name="activo" class="filled-in" {{ $proveedor->persona->activo === 1 ? "checked=checked" : "" }} />
                                <span>Activo</span>
                            </label>
                        </p>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="correo" name="correo" type="text" class="validate" value="{{ $proveedor->persona->correo }}">
                                <label for="correo">Correo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ci_nit" name="ci_nit" type="text" class="validate" value="{{ $proveedor->persona->ci_nit }}">
                                <label for="ci_nit">Carnet de identidad</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ciudad" name="ciudad" type="text" class="validate" value="{{ $proveedor->ciudad }}">
                                <label for="ciudad">Ciudad</label>
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
        cantidad_actual_telefonos = {{ sizeof($proveedor->telefonos) }}
    </script>
@endpush

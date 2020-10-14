@extends('layouts.app')

@section('page-title', 'Proveedor')

@section('navbar-logo', 'Havla - Proveedor')

@section('breadcrumbs')
    <a href="{{ route('proveedores.index') }}" class="breadcrumb">Gestionar Proveedores</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('proveedores.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>
                        @foreach ($errors->all() as $message)
                            <p class="flow-text">{{ $message }}</p>
                        @endforeach
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="nombre" name="nombre" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="direccion" name="direccion" type="text" class="validate">
                                <label for="direccion">Dirección</label>
                            </div>
                        </div>


                        <div id="lista-telefonos">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="telefono" name="telefonos[]" type="text" class="validate">
                                    <label for="telefono">Telefono</label>
                                </div>
                            </div>
                        </div>
                        <a class="waves-effect waves-light btn-small" id="add_telefono"><i class="material-icons right">add</i>Telefono</a>

                        <p>
                            <label>
                                <input type="checkbox" id="activo" name="activo" class="filled-in"/>
                                <span>Activo</span>
                            </label>
                        </p>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="correo" name="correo" type="text" class="validate">
                                <label for="correo">Correo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ci_nit" name="ci_nit" type="text" class="validate">
                                <label for="ci_nit">Carnet de identidad</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ciudad" name="ciudad" type="text" class="validate">
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

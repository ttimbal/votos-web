@extends('layouts.app')

@section('page-title', 'Compra')

@section('navbar-logo', 'Havla - Compra')

@section('breadcrumbs')
    <a href="{{ route('compras.index') }}" class="breadcrumb">Registrar Compra</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('compras.store') }}">
            @csrf
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="card-panel grey lighten-4">
                        <h3 class="center">Formulario de creación</h3>

                        <div class="input-field col s12 row">
                            <select name="proveedor">
                                <option value="" disabled selected >Escoge una opción</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->persona_id }}" onclick="agregarOptions()">{{ $proveedor->persona->nombre }}</option>
                                @endforeach
                            </select>
                            <label>Proveedor</label>
                        </div>
                        <a class="waves-effect waves-light btn" onclick="agregarOptions()">button</a>
                        <div class="input-field col s12 row">
                            <select id="pedido" name="pedido">
                                <option value=""selected>Escoge una opción</option>
                                <option value="">Escoge una opción</option>
                                <option value="">Escoge una opción</option>
                                <option value="">Escoge una opción</option>
                            </select>
                            <label>Pedido</label>
                        </div>


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
        function agregarOptions() {
            var select = document.getElementById("pedido");

            for (let i = 0; i < select.options.length; i++) {
                select.remove(i);

            }
            alert(select.options.length);
        }
    </script>
@endpush

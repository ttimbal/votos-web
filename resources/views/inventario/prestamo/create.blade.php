@extends('layouts.app')

@section('page-title', 'Prestamo')

@section('navbar-logo', 'Havla - Prestamo')

@section('breadcrumbs')
    <a href="{{ route('prestamos.index') }}" class="breadcrumb">Registrar Préstamo</a>
    <a class="breadcrumb">Create</a>
@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('prestamos.store') }}">
            @csrf
            <div class="col col s12 m12 l10 offset-l1">
                <div class="card-panel grey lighten-4">
                    <h3 class="center">Formulario de creación</h3>
                    @foreach ($errors->all() as $message)
                        <p class="flow-text">{{ $message }}</p>
                    @endforeach

                    <div class="input-field col s12">
                        <select name="encargadoDeAlmacen">
                            <option value="{{ \Illuminate\Support\Facades\Auth::user()->persona_id }}" selected>{{ \Illuminate\Support\Facades\Auth::user()->name }}</option>
                        </select>
                        <label>Encargado De Almacen</label>
                    </div>

                    <div class="input-field col s12">
                        <select name="cliente_id">
                            <option disabled selected>Seleccionar cliente</option>
                            <optgroup label="Docentes">
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->persona_id }}">{{ $docente->persona->nombre }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Administrativos">
                                @foreach($administrativos as $administrativo)
                                    {{-- 3 por que no tiene que ser Encargado de Almacen --}}
                                    @if($administrativo->cargo != $cargoAdministrativos[3])
                                        <option value="{{ $administrativo->persona_id }}">{{ $administrativo->persona->nombre . ' - ' .$administrativo->cargo  }}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                        <label>Cliente</label>
                    </div>
                    <div class="input-field col s12">
                        <select class="almacenes">
                            <option value="" disabled selected>Seleccione un almacén</option>
                            @php
                                $j = 0;
                                $cantidadTotal = count($almacenes);
                                $nombreAlmacen = '';
                            @endphp
                            @while($j < $cantidadTotal)
                                <option
                                    value="{{ $almacenes[$j]->codigo }}">{{ 'id: '.$almacenes[$j]->codigo.' nombre: '.$almacenes[$j]['nombre'] }}</option>
                                @php
                                    $j++;
                                @endphp
                            @endwhile
                        </select>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="fecha" name="fecha" type="text" class="datepicker validate"
                                   value="{{ old('fecha') }}">
                            <label for="fecha">Fecha a recoger</label>
                            <span class="helper-text" data-error="incorrecto" data-success="correcto">
                                        @error('fecha')
                                {{ $message }}
                                @enderror
                                    </span>
                        </div>


                        <div class="input-field col s6">
                            <input id="hora" name="hora" type="text" class="timepicker">
                            <label for="hora">Hora a recoger</label>

                        </div>
                    </div>
                    <button class="btn-small waves-effect waves-light red" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    <br>
                    <br>
                    <br>
                    <div id="lista-instrumentos">

                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>

        var $select2 = $('select.almacenes');
        $select2.on('change', function (e) {
            console.log('Standard select changed: ' + e.target.value);
            var cod=e.target.value;
            //window.location.href="create.blade.php?codigo="+cod;

            $("#lista-instrumentos").replaceWith(`
                    @php
                    $instrumentosAlmacen=\App\Core\Repositories\InstrumentoRepository::InstrumestsByAlmacen(1);
                @endphp
                <table class="responsive-table centered striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
@foreach($instrumentosAlmacen as $currentinstrumento)
                <tr>
                    <td>{{ $currentinstrumento->numero}}</td>
                        <td>{{  $currentinstrumento->nombre }}</td>
                        <td>{{  $currentinstrumento->estado }}</td>
                        <td>

                        <label>
        <input type="checkbox"  name="instrumentos_id[]"  class="filled-in" value="{{$currentinstrumento->numero}}" />
        <span></span>
      </label
    </td>
</tr>
@endforeach
                </tbody>
            </table>`
            );
        });


    </script>
@endpush

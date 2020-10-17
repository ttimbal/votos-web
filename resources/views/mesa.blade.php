@extends('layouts.app')

@section('page-title', 'Home')


@section('content')
    @csrf
    <div class="row">
        <div class="col s12 center">
            <h1>Total de votos: {{$total}}</h1>
        </div>
        @foreach($blanco_nulo as $bn)
            <div class="col s6 center">
                <h3>Blancos: {{$bn->blancos}}</h3>
            </div>
            <div class="col s6 center">
                <h3>Nulos: {{$bn->nulos}}</h3>
            </div>
        @endforeach
        <div class="row">
            <div class="col center s5 offset-l1">
                <div class="card-panel grey lighten-4">
                    <h4 class=""><b>Votos de Presidentes</b></h4>

                    <table class="centered">
                        <thead>
                        <tr>
                            <th>PARTIDO</th>
                            <th>VOTOS</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($votos_presidente as $voto)
                            <tr>
                                <td><b>{{ $voto->nombre }}</b></td>
                                <td><b>{{ $voto->cantidad_voto }}</b></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="col center s5">
                <div class="card-panel grey lighten-4">

                    <h4 class=""><b>Votos de Diputados</b></h4>
                    <table class="centered">
                        <thead>
                        <tr>
                            <th>PARTIDO</th>
                            <th>VOTOS</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($votos_diputado as $voto)
                            <tr>
                                <td><b>{{ $voto->nombre }}</b></td>
                                <td><b>{{ $voto->cantidad_voto }}</b></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <h4 class="center">Mesas</h4>
        <div class="col s12 m12 ">
            <div class="card-panel  white center lighten-4">

                <ul class="collapsible collapsible-accordion s12 center">
                    @foreach($mesaRecinto as $mesa)
                        <li>
                            @if($mesa->con_votos)
                                @php
                                    $color='red';
                                @endphp
                            @else
                                @php
                                    $color='white';
                                @endphp
                            @endif



                                <div class="center offset-l2">
                                    <h6 class="collapsible-header waves-effect {{$color}}"><b>Mesa N°{{$mesa->mesa_nro}}</b></h6>
                                </div>
                            <div class="collapsible-body">

                                <div class="row">
                                    <form id="formulario" method="POST" action="{{ route('guardar',$mesa->recinto_id) }}">
                                        @csrf
                                        <div class="col col s12 m12 l10 offset-l1">



                                            <div class="card-panel grey lighten-4">
                                                <h1 class="center">Votos</h1>
                                                <br>
                                                <br>
                                                <br>

                                                <input placeholder="Blancos" hidden name="mesa_recinto_id"
                                                       id="first_name" type="text" class="validate"
                                                       value="{{$mesa->id}}">
                                                <div class="row center">
                                                    <div class="input-field col s6 ">
                                                        <input placeholder="Blancos" name="blanco" id="first_name"
                                                               type="text" class="validate">
                                                        <label class="black-text" for="first_name">Blancos</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input placeholder="Nulos" name="nulo" id="first_name"
                                                               type="text" class="validate">
                                                        <label class="black-text" for="first_name">Nulos</label>
                                                    </div>
                                                </div>
                                                @foreach($partidos as $partido)
                                                    <div class="row center">
                                                        <div
                                                            class="input-field col s3 black-text">{{$partido->nombre}}</div>

                                                        <div class="input-field col s3">
                                                            <input placeholder="Presidente"
                                                                   name="pre_{{strtolower(substr($partido->nombre,0,3))}}"
                                                                   id="first_name" type="text" class="validate">
                                                            <label class="black-text" for="first_name">voto
                                                                presidente</label>
                                                        </div>
                                                        <div class="input-field col s3">
                                                            <input placeholder="Diputado"
                                                                   name="dip_{{strtolower(substr($partido->nombre,0,3))}}"
                                                                   id="first_name" type="text" class="validate">
                                                            <label class="black-text" for="first_name">voto
                                                                diputado</label>

                                                        </div>
                                                    </div>
                                                @endforeach


                                                <div class="row center">
                                                    <button class="btn-small waves-effect waves-light red"
                                                            type="submit">Enviar
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            document.getElementById("formulario").addEventListener('submit',validarFormulario);
        });
        function validarFormuario(evento){
            evento.preventDefault();
        }

    </script>
@endpush


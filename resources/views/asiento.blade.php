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
        <h4 class="center">Municipios</h4>
        <div class="col s12 m12 l6 offset-l3">
            <div class="card-panel white center lighten-4">
                <ul class="collapsible collapsible-accordion">
                    @foreach($asientos as $asiento)
                        <li>
                            <a class="collapsible-header waves-effect black-text"><b>{{$asiento->nombre}}</b></a>
                            <div class="collapsible-body">
                                <ul>
                                    @foreach($asiento['recintos'] as $recinto)
                                        <div>
                                            <br>
                                            <li>

                                                <a class="waves-effect waves-light btn blue" href="{{ route('mesas',$recinto->id) }}"><b>{{$recinto->nombre}}</b></a>
                                            </li>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection

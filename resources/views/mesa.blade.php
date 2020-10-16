@extends('layouts.app')

@section('page-title', 'Home')


@section('content')
    @csrf
    <div class="row">
        <div class="col s12 m12 ">
            <div class="card-panel  white center lighten-4">
                <ul class="collapsible collapsible-accordion s12 center">
                    @foreach($mesaRecinto as $mesa)
                        <li>
                            <a class="collapsible-header waves-effect">{{$mesa->mesa_nro}}</a>
                            <div class="collapsible-body">
                                <div class="row">
                                    <form method="POST" action="{{ route('guardar') }}">
                                        @csrf
                                        <div class="col col s12 m12 l10 offset-l1">
                                            <div class="card-panel grey lighten-4">
                                                <h1 class="center">Votos</h1>
                                                <br>
                                                <br>
                                                <br>
                                                <input placeholder="Blancos" hidden name="mesa_recinto_id" id="first_name" type="text" class="validate" value="{{$mesa->id}}">
                                                <div class="row center">
                                                    <div class="input-field col s6 ">
                                                        <input placeholder="Blancos" name="blanco" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">Blancos</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input placeholder="Nulos" name="nulo" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">Nulos</label>
                                                    </div>
                                                </div>
                                                <div class="row center">
                                                    <div class="input-field col s3 black-text">
                                                        MAS IPSP
                                                    </div>

                                                    <div class="input-field col s3">
                                                        <input placeholder="Presidente" name="pre_mas" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto presidente</label>
                                                    </div>
                                                    <div class="input-field col s3">
                                                        <input placeholder="Diputado" name="dip_mas" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto diputado</label>
                                                    </div>
                                                </div>

                                                <div class="row center">
                                                    <div class="input-field col s3 black-text">
                                                        Creemos
                                                    </div>

                                                    <div class="input-field col s3">
                                                        <input placeholder="Presidente" name="pre_cre"id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto presidente</label>
                                                    </div>
                                                    <div class="input-field col s3">
                                                        <input placeholder="Diputado" name="dip_cre" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto diputado</label>
                                                    </div>
                                                </div>
                                                <div class="row center">
                                                    <div class="input-field col s3 black-text">
                                                        Comunidad Ciudadana
                                                    </div>

                                                    <div class="input-field col s3">
                                                        <input placeholder="Presidente" name="pre_com" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto presidente</label>
                                                    </div>
                                                    <div class="input-field col s3">
                                                        <input placeholder="Diputado" name="dip_com" id="first_name" type="text" class="validate">
                                                        <label class="black-text" for="first_name">voto diputado</label>
                                                    </div>
                                                </div>





                                                <div class="row center">
                                                    <button class="btn-small waves-effect waves-light red" type="submit">Enviar
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

@extends('layouts.app')

@section('page-title', 'Home')


@section('content')
    @csrf
    <div class="row">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card-panel white center lighten-4">
                <ul class="collapsible collapsible-accordion">
                    @foreach($asientos as $asiento)
                        <li>
                            <a class="collapsible-header waves-effect">{{$asiento->nombre}}</a>
                            <div class="collapsible-body">
                                <ul>
                                    @foreach($asiento['recintos'] as $recinto)
                                        <div>
                                            <li><a href="{{ route('mesas',$recinto->id) }}">{{$recinto->nombre}}</a>
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

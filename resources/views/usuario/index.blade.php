@extends('layouts.app')

@section('page-title', 'Instituto havla')

@section('content')
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{ asset('photos/guitar2.jpg') }}"> <!-- random image -->
                <div class="caption center-align">
                    <h1>Havla.</h1>
                    <h5 class="light grey-text text-lighten-3">instituto de artes musicales</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('photos/canto.jpg') }}"> <!-- random image -->
                <div class="caption left-align">
                    <h3>Left Aligned Caption</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('photos/composer.jpg') }}"> <!-- random image -->
                <div class="caption right-align">
                    <h3>Right Aligned Caption</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('photos/teatro.jpg') }}"> <!-- random image -->
                <div class="caption right-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('photos/dancing.jpg') }}"> <!-- random image -->
                <div class="caption center-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
        </ul>
    </div>
@endsection

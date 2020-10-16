@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s4 offset-s4">
            <div class="card blue lighten-5">
                <div class="card-content text-darken-1">
                    <h3 class="center">Login</h3>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="validate @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    <label for="password">Password</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col offset-s4">
                                    <button class="btn-small waves-effect waves-light center" type="submit" name="action" onclick="showProgress()">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="navbar-fixed">
    <nav class="navbar nav-extended no-padding blue darken-4">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center hide-on-small-only">@yield('navbar-logo')</a>
            <ul id="nav-mobile" class="left">

                @auth
                    <li>
                        <a href="#!" data-target="sidenav-left" class="sidenav-trigger waves-effect left show-on-medium-and-up"><i class="material-icons dark-primary-color-icon">menu</i></a>
                    </li>
                @endauth
                @guest
                    @if(Request::path() != 'login')
                        <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
</div>

<ul id="sidenav-left" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{ asset('photos/fondo.jpg') }}">
            </div>
            <a href="#user"><img class="circle" src="{{ asset('photos/profile.png') }}"></a>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">


            <li>
                <a class="collapsible-header waves-effect">Municipios<i class="material-icons">accessibility</i></a>
                <div class="collapsible-body">
                    <ul>


                        <li><a href="{{ route('asientos',1) }}">La Guardia</a></li>

                        <li><a href="{{ '' }}">Porongo</a></li>

                        <li><a href="{{ '' }}">Cabezas</a></li>

                    </ul>
                </div>
            </li>


        </ul>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">opciones</a></li>
    <li>
        <a class="waves-effect" href="{{ ''}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>


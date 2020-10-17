<ul id="sidenav-left" class="sidenav">
    <li>
        <div class="user-view">
            <div class="center blue">
            </div>
            <a href="#user"><img class="circle" src="{{ asset('photos/profile.png') }}"></a>
        </div>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">


            <li>
                <a class="collapsible-header waves-effect">Municipios</a>
                <div class="collapsible-body">
                    <ul>


                        <li><a href="{{ route('asientos',1) }}">La Guardia</a></li>
                        <li><a href="{{ route('asientos',2) }}">Camiri</a></li>
                        <li><a href="{{ route('asientos',3) }}">Cabezas</a></li>
                        <li><a href="{{ route('asientos',4) }}">Charagua</a></li>
                        <li><a href="{{ route('asientos',5) }}">Boyuibe</a></li>
                        <li><a href="{{ route('asientos',6) }}">Lagunillas</a></li>
                        <li><a href="{{ route('asientos',7) }}">Cuevo</a></li>

                    </ul>
                </div>
            </li>
            <li><a class="collapsible-header waves-effect" href="{{ route('graficos') }}">graficos</a></li>

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


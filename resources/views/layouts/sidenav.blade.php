<ul id="sidenav-left" class="sidenav">
    <li><div class="user-view">
            <div class="background">
                <img src="{{ asset('photos/fondo.jpg') }}">
            </div>
            <a href="#user"><img class="circle" src="{{ asset('photos/profile.png') }}"></a>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">

            @role('Super Admin')
                <li>
                    <a class="collapsible-header waves-effect">Módulo Usuario<i class="material-icons">account_box</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('usuarios.index') }}">Gestionar Usuario</a></li>
{{--                            <li><a href="{{ route('permisos.index') }}">Gestionar Permisos</a></li>--}}
                            <li><a href="{{ route('roles.index') }}">Gestionar Roles</a></li>
                        </ul>
                    </div>
                </li>
            @endrole

            @can('ver paquete personal')
                <li>
                    <a class="collapsible-header waves-effect">Módulo Personal<i class="material-icons">accessibility</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('ver cu docente')
                                <li><a href="{{ route('docentes.index') }}">Gestionar Docente</a></li>
                            @endcan
                            @can('ver cu administrativo')
                                    <li><a href="{{ route('administrativos.index') }}">Gestionar Administrativo</a></li>
                            @endcan
                            @can('ver cu asistencia')
                                    <li><a href="{{ route('asistencias.index') }}">Registrar Asistencias</a></li>
                            @endcan
                            @can('ver cu especialidad')
                                <li><a href="{{ route('especialidades.index') }}">Registrar Especialidad</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('ver paquete servicios ofertados')
                <li>
                    <a class="collapsible-header waves-effect">Módulo de Servicios ofertados<i class="material-icons">notifications_none</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('ver cu curso ofertado')
                                <li><a href="{{ route('cursos.index') }}">Gestionar cursos ofertado</a></li>
                            @endcan
                            @can('ver cu promocion')
                                <li><a href="{{ route('promociones.index') }}">Gestionar Promoción</a></li>
                            @endcan
                            @can('ver cu materia')
                                <li><a href="{{ route('materias.index') }}">Gestionar Materia</a></li>
                            @endcan
                            @can('ver cu horario')
                                <li><a href="{{ route('horarios.index') }}">Gestionar Horario</a></li>
                            @endcan
                            @can('ver cu grupo')
                                <li><a href="{{ route('grupos.index') }}">Gestionar Grupo</a></li>
                            @endcan
                            @can('ver cu periodo')
                                <li><a href="{{ route('periodos.index') }}">Gestionar Periodo</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('ver paquete inventario')
                <li>
                    <a class="collapsible-header waves-effect">Módulo de Inventario<i class="material-icons">store</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('ver cu instrumento')
                                <li><a href="{{ route('instrumentos.index') }}">Registrar instrumento</a></li>
                            @endcan
                            @can('ver cu prestamo')
                                <li><a href="{{ route('prestamos.index') }}">Gestionar préstamo</a></li>
                            @endcan
                            @can('ver cu devolucion')
                                <li><a href="{{ route('devoluciones.index') }}">Registrar devolución</a></li>
                            @endcan
                                @can('ver cu reserva')
                                    <li><a href="{{ route('reservas.index') }}">Registrar Reserva</a></li>
                                @endcan
                            @can('ver cu almacen')
                                <li><a href="{{ route('almacenes.index') }}">Gestionar Almacén</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('ver paquete compra')
                <li>
                    <a class="collapsible-header waves-effect">Módulo de Compra<i class="material-icons">local_grocery_store</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('ver cu proveedor')
                                <li><a href="{{ route('proveedores.index') }}">Gestionar proveedor</a></li>
                            @endcan
                            @can('ver cu compra')
                                <li><a href="{{ route('compras.index') }}">Registrar compra</a></li>
                            @endcan
                            @can('ver cu pedido')
                                <li><a href="{{ route('pedidos.index') }}">Gestionar pedido</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan


            <li>
                <a class="collapsible-header waves-effect">Módulo de Reporte<i class="material-icons">local_grocery_store</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ route('proveedores.index') }}">Reporte de Existencias de Almacen</a></li>

                        <li><a href="{{ route('compras.index') }}">Reporte de Stock</a></li>

                    </ul>
                </div>
            </li>

        </ul>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">User Options</a></li>
    <li>
        <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>


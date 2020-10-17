<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('page-title')</title>

    <link rel="shortcut icon" href="{{ asset('photos/favicon-havla-32x32.png') }}">

    <!-- Incluimos los estilos -->
    @include('layouts.styles')

    <!-- Pila para estilos adicionales -->
    @stack('styles')
</head>
<body>
    @auth
        <header>
            @include('layouts.sidenav')
        </header>
    @endauth
    @include('layouts.navbar')

    <main class="primary-background ">

        @include('layouts.response')
        @auth
            @include('layouts.breadcrumbs')
        @endauth
        @yield('content')
        {{-- antes estaba aqui el boton flotante --}}
        @include('layouts.preloader')
    </main>



    <!-- Incluimos los scripts -->
    @include('layouts.scripts')

    <!-- Pila para scripts adicionales -->
    @stack('scripts')

</body>
</html>

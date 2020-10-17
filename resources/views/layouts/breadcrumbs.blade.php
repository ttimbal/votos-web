<nav hidden>
    <div class="nav-wrapper" >
        <div class="col s12" >
            @if(Request::path() != 'home')
                <a href="{{ route('home') }}" class="breadcrumb">Dashboard</a>
            @else
                <a class="breadcrumb disabled">Dashboard</a>
            @endif
            @yield('breadcrumbs')
        </div>
    </div>
</nav>

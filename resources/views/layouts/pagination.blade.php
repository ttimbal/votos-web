<ul class="pagination center-align">
    @if($paginator->currentPage() == 1)
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    @else
        <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
    @endif

    @for($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ $i == $paginator->currentPage() ? 'active' : 'waves-effect' }}"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
    @endfor

    @if($paginator->currentPage() == $paginator->lastPage())
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    @else
        <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
    @endif

</ul>

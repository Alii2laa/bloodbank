{{--<nav aria-label="Page navigation example" dir="ltr">--}}
{{--    <ul class="pagination">--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>--}}
{{--        </li>--}}
{{--        <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="#" aria-label="Next">--}}
{{--                <span aria-hidden="true">&raquo;</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" dir="ltr">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link active" href="{{$url}}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$url}}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else

                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a>
                </li>
            @endif
        </ul>
    </nav>
@endif


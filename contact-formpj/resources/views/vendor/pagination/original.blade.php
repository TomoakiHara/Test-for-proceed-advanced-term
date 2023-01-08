<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display:flex;
            justify-content: space-between;
            margin:0 30px;
        }
        .pagination {
            display:flex;   
            justify-content: space-between;
            margin-top:15px;
        }
        .page-item {
            height:22px;
            border:1px solid gray;
            padding:5px 10px;
        }
    </style>
</head>

<body>
@if ($paginator->hasPages())
    <nav>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="total_page">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('全') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('件中') !!}
                    @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('~') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                    {{ $paginator->count() }}
                    @endif
                    {!! __('件') !!}        
                </p>
            </div>

            <div class="pagination justify-content-center pagination-lg">
                {{-- Previous Page Link --}}@cannot('update', Model::class)

                @endcannot
                @if ($paginator->onFirstPage())
                    <div class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </div>
                @else
                    <div class="page-item">
                        <a class="page-link text-success" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                    </div>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <div class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></div>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <div class="page-item active" aria-current="page"><span class="page-link bg-success border-success">{{ $page }}</span></div>
                            @else
                                <div class="page-item"><a class="page-link text-success" href="{{ $url }}">{{ $page }}</a></div>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <div class="page-item">
                        <a class="page-link text-success" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                    </div>
                @else
                    <div class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </div>
                @endif
            </div>
        </div>
    </nav>
@endif

</body>
</html>


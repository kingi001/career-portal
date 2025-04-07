@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-1">
        <div class="flex justify-between flex-1 sm:hidden text-xs">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-2 py-1 text-xs text-gray-700 bg-white border border-gray-300 rounded hover:text-gray-500">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-2 py-1 ml-2 text-xs text-gray-700 bg-white border border-gray-300 rounded hover:text-gray-500">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="inline-flex items-center px-2 py-1 ml-2 text-xs text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between text-xs">
            <div>
                <p class="text-gray-600">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Arrow --}}
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border border-gray-300 rounded-l cursor-not-allowed">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-2 py-1 text-xs text-gray-700 bg-white border border-gray-300 rounded-l hover:text-gray-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Links --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border-t border-b border-gray-300">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-blue-600 border border-blue-600">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="inline-flex items-center px-2 py-1 text-xs text-gray-700 bg-white border border-gray-300 hover:text-blue-600">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Arrow --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-2 py-1 text-xs text-gray-700 bg-white border border-gray-300 rounded-r hover:text-gray-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border border-gray-300 rounded-r cursor-not-allowed">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif

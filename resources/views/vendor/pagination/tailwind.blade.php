@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">
    <ul class="flex items-center -space-x-px h-10 text-base">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li>
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md">
                &lt;
            </span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 rounded-l-md">
                &lt;
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li aria-disabled="true">
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default">{{
                $element }}</span>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li aria-current="page">
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 bg-white border border-gray-300 ring-2 ring-indigo-600 ring-inset">{{
                $page }}</span>
        </li>
        @else
        <li>
            <a href="{{ $url }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">{{
                $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 rounded-r-md">
                &gt;
            </a>
        </li>
        @else
        <li>
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md">
                &gt;
            </span>
        </li>
        @endif
    </ul>
</nav>
@endif

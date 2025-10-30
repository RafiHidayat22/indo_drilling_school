@if ($paginator->hasPages())
<div class="flex items-center justify-between">
    <div class="text-sm text-slate-600">
        Menampilkan <span class="font-semibold">{{ $paginator->firstItem() }}</span> sampai <span class="font-semibold">{{ $paginator->lastItem() }}</span> dari <span class="font-semibold">{{ $paginator->total() }}</span> artikel
    </div>
    <div class="flex space-x-2">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
        <span class="px-3 py-2 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed pagination-btn">Previous</span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn">Previous</a>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <span class="px-4 py-2 bg-slate-100 text-slate-500 rounded-lg">{{ $element }}</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium pagination-btn active">{{ $page }}</span>
        @else
        <a href="{{ $url }}" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn">Next</a>
        @else
        <span class="px-3 py-2 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed pagination-btn">Next</span>
        @endif
    </div>
</div>
@endif
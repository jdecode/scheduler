@props([
    'title' => 'meeting',
    'title_url' => '/meeting/create',
])

<div class="text-center p-8 border border-dashed border-2 border-gray-500/25">
    <svg class="mx-auto h-12 w-12 text-fnl-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium">No {{ $title }} setup</h3>
    <p class="mt-1 text-sm text-gray-500">Setup one now!</p>
    <div class="mt-6">
        <a
            href="{{ $title_url }}"
            class="
                inline-flex items-center px-4 py-2
                border border-transparent shadow-sm text-base font-bold rounded-md
                text-white
                bg-fnl-600 hover:bg-fnl-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fnl-500">
            <x-svg-icon
                svg="plus"
                class="h-5 w-5 mr-2 stroke-gray-50 "
                title=""></x-svg-icon>
            New {{ ucfirst($title) }}
        </a>
    </div>
</div>

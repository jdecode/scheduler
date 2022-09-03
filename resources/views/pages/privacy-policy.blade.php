<x-layouts.landing-page>
    @section('title', config('app.name', 'Laravel ') . ' - Privacy policy')
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Privacy policy') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    This is privacy policy page
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing-page>

<x-app-layout xmlns:x-on="http://www.w3.org/1999/xhtml">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    @if (session('status'))
                        <div
                            x-cloak
                            x-init="$dispatch('open-notification', {content: 'You are logged in !' } )">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

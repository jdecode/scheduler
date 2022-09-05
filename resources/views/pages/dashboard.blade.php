<x-app-layout xmlns:x-on="http://www.w3.org/1999/xhtml">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="mb-6">
            <div class="mx-auto ">
                <div class="overflow-hidden sm:rounded-lg">
                    @if(!empty(Auth::user()->schedule->uuid))
                        <div class="flex items-start">
                            <div
                                data-link="{{ URL::to(route('connectWithMe', Auth::user()->schedule->uuid)) }}"
                                class="
                                    text-gray-600 dark:text-gray-400
                                    py-4 my-4
                                    flex flex-col justify-start
                                    "
                                >
                                <div>My calendar link: </div>
                            </div>
                            <div
                                class="
                                    text-gray-800 dark:text-gray-200
                                    p-4 my-4
                                    ">
                                <div class="underline underline-offset-2 select-all">
                                    {{ URL::to(route('connectWithMe', Auth::user()->schedule->uuid)) }}
                                </div>
                                <div class="text-gray-500 text-sm">Click (to select), CTRL+C (to copy)</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <x-custom.calendar></x-custom.calendar>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    @if (session('status'))
                        <div
                            x-cloak
                            x-init="$dispatch('open-notification', {content: '{{ session('status') }}' } )">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                        <div
                            data-link="{{ URL::to(route('connectWithMe', Auth::user()->schedule->uuid)) }}"
                            class="text-gray-600 dark:text-gray-400 ">
                            <div>Connect with me </div>
                        </div>
                        <div class="">
                            <div
                                class="
                                    text-gray-800 dark:text-gray-200
                                    py-1 my-1
                                    ">
                                <div class="underline underline-offset-2 select-all">
                                        <input
                                            id="connect-with-me"
                                            type="text"
                                            class="
                                                w-full
                                                bg-gray-100 dark:bg-gray-800
                                                border-0 focus:ring-0
                                                cursor-default
                                            "
                                            readonly
                                            value="{{ URL::to(route('connectWithMe', Auth::user()->schedule->uuid)) }}"
                                        />
                                </div>
                                <div
                                    class="text-gray-500 text-sm pt-1 cursor-pointer hover:text-gray-700 dark:hover:text-gray-300D"
                                    onclick="copyConnectWithMeLink()">Click to copy</div>
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
        <script>
            function copyConnectWithMeLink() {
                const element = document.querySelector('#connect-with-me');
                element.select();
                element.setSelectionRange(0, 99999);
                document.execCommand('copy');
            }
        </script>
    </div>
</x-app-layout>

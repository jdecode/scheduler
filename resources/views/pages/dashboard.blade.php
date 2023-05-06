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
                            class="text-gray-600 dark:text-gray-400 "
                        >
                            <div>Your "Connect with me" link </div>
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
                                                w-[600px]
                                                bg-gray-100 dark:bg-gray-900
                                                border-0 focus:ring-0
                                                cursor-default
                                                p-0
                                            "
                                            readonly
                                            value="{{ URL::to(route('connectWithMe', Auth::user()->schedule->uuid)) }}"
                                        />
                                </div>
                                <div
                                    onclick="copyConnectWithMeLink()"
                                    class="bg-green-700 hover:bg-green-600
                                        text-white text-center
                                        font-bold py-2 rounded cursor-pointer w-24
                                        mt-2
                                        "
                                >
                                    Copy link
                                </div>
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
            async function copyConnectWithMeLink() {
                const meLink = document.querySelector('#connect-with-me');
                meLink.select();
                meLink.setSelectionRange(0, 99999);
                document.execCommand('copy');
            }
        </script>
    </div>
</x-app-layout>

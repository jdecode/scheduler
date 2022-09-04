<x-app-layout xmlns:x-on="http://www.w3.org/1999/xhtml">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('My Meetings') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto">
        <div class="overflow-hidden sm:rounded-md">
            <ul role="list" class="bg-gray-200 dark:bg-gray-800/25">
                @if(empty($meetings))
                    <div>
                        <x-empty-state
                            title="Meeting"
                            title_url="{{ route('meetings.create') }}"></x-empty-state>
                    </div>
                @endif
                @foreach (($meetings ?? []) as $meeting)
                    <li class="mt-6 border-t-2 border-t-fnl-500 px-3">
                        <div class="text-xl py-6 sm:flex sm:justify-between">
                            <span class="max-w-full sm:max-w-none">
                                {{ $meeting['id'] }}
                            </span>
                            <span class="text-base text-gray-500">
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>

<x-app-layout xmlns:x-on="http://www.w3.org/1999/xhtml">
    <x-slot name="header">
        <h2 class="font-semibold text-3xl leading-tight">
            {{ __('My Schedule') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto">
        <div class="overflow-hidden sm:rounded-md">
            <x-custom.my-schedule
                :days="$days"
                :schedule="$schedule"
                ></x-custom.my-schedule>
        </div>
    </div>
</x-app-layout>

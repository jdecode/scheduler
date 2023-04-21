<x-layouts.landing-page>
    @section('title', config('app.name', 'Laravel ') . ' - Privacy policy')
    <x-slot name="header">
        <h2 class="text-xl leading-tight font-light">
            <span>
                {{ __('Select a date to connect with : ') }}
            </span>
            <span class="font-semibold">
                {{ $schedule->user->toArray()['name'] }}
            </span>
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <form method="POST" action="{{ route('saveMeeting', $schedule->toArray()['uuid']) }}">
                        @csrf
                        <div class="flex flex-col">
                            <label for="date" class="mb-2">{{ __('Date') }}</label>
                            <input type="date" name="date" id="date" class="border border-gray-300 p-2 rounded mb-4" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="time" class="mb-2">{{ __('Time') }}</label>
                            <input type="time" name="time" id="time" class="border border-gray-300 p-2 rounded mb-4" value="{{ old('time') }}" required>
                            @error('time')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="duration" class="mb-2">{{ __('Duration: ') }}</label>
                            <div class="border border-gray-300 p-2 rounded mb-4">
                                {{ $schedule->toArray()['slot_size'] }}
                            </div>
                            @error('duration')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="description" class="mb-2">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="border border-gray-300" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-500 font-bold py-2 px-4 rounded">
                                {{ __('Submit') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing-page>

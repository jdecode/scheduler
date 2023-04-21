@props([
    'days' => [],
    'schedule' => []
])

<form method="POST" action="{{ route('saveSchedule') }}">
    @php
        $availability_starts = (int) \Carbon\Carbon::createFromTimeString(($schedule->availability_starts))->format('H');
        $availability_ends = (int) \Carbon\Carbon::createFromTimeString(($schedule->availability_ends))->format('H');
        $slot_size = (int) $schedule->slot_size;
    @endphp
    @csrf
    @method('PUT')
    <fieldset class="w-full md:w-3/5">
        <legend class="text-5xl font-medium text-right text-gray-500/50">Days</legend>
        <div class="mt-4">
            @foreach($days as $day => $value)
                <div class="
                        relative flex items-end justify-between
                        py-4 px-8
                        border border-b border-t-0 border-l-0 border-r-0 border-gray-500/50
                        ">
                    <div class="w-auto text-lg">
                        <label for="day-{{ $day }}" class="select-none font-medium text-gray-500">{{ ucfirst($day) }}</label>
                    </div>
                    <div class="ml-3 h-5">
                        <input
                            id="day-{{ $day }}"
                            name="days[{{ $day }}]"
                            value="1"
                            {{ $value ? 'checked' : '' }}
                            type="checkbox"
                            class="
                                h-4 w-4 rounded text-dev-500
                                ring-0 focus:ring-0 focus:outline-none
                                " />
                    </div>
                </div>
            @endforeach
        </div>
    </fieldset>
    <fieldset class="mt-10 w-full md:w-3/5">
        <legend class="text-5xl font-medium text-right text-gray-500/50">Availability</legend>
        <div class="
            mt-4 w-full min-w-full px-8 flex items-center
            border border-gray-500/50 border-t-0 border-l-0 border-r-0
            pb-4
            ">
            <div class="w-auto">
                <label for="availability_starts" class="block text-lg font-medium text-gray-500">From: </label>
                <select
                    id="availability_starts"
                    name="availability_starts"
                    class="
                        mt-1 rounded-md py-2 pl-3 pr-10 text-base
                        border border-gray-500 focus:outline-none focus:ring-0 ring-0
                        text-gray-700 dark:text-gray-100
                        bg-gray-100 dark:bg-gray-800/25
                        w-36
                        ">
                    @foreach(range(0, 23) as $hour)
                        <option
                            class="
                                text-gray-700 dark:text-gray-100
                                bg-gray-100 dark:bg-gray-800
                                "
                            value="{{ $hour }}"
                            {{ $hour == $availability_starts ? 'selected' : '' }}
                        >{{ $hour > 12 ? $hour-12 : $hour }}:00 {{ $hour >= 12 ? 'PM' : 'AM' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-auto ml-12">
                <label for="availability_ends" class="block text-lg font-medium text-gray-500">To: </label>
                <select
                    id="availability_ends"
                    name="availability_ends"
                    class="
                        mt-1 rounded-md py-2 pl-3 pr-10 text-base
                        border border-gray-500 focus:outline-none focus:ring-0 ring-0
                        text-gray-700 dark:text-gray-100
                        bg-gray-100 dark:bg-gray-800/25
                        w-36
                        ">
                    @foreach(range(0, 23) as $hour)
                        <option
                            class="
                                text-gray-700 dark:text-gray-100
                                bg-gray-100 dark:bg-gray-800
                                "
                            value="{{ $hour }}"
                            {{ $hour == $availability_ends ? 'selected' : '' }}
                        >{{ $hour > 12 ? $hour-12 : $hour }}:00 {{ $hour >= 12 ? 'PM' : 'AM' }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-10 w-full md:w-3/5">
        <legend class="text-5xl font-medium text-right text-gray-500/50">Slot Size</legend>
        <div class="mt-4 w-full min-w-full px-8 flex items-center">
            <div class="w-auto">
                <label for="slot_size" class="block text-lg font-medium text-gray-500">Slot size: </label>
                <select
                    id="slot_size"
                    name="slot_size"
                    class="
                        mt-1 rounded-md py-2 pl-3 pr-10 text-base
                        border border-gray-500 focus:outline-none focus:ring-0 ring-0
                        text-gray-700 dark:text-gray-100
                        bg-gray-100 dark:bg-gray-800/25
                        w-36
                        ">
                    @foreach(range(15, 60, 15) as $minutes)
                        <option
                            class="
                                text-gray-700 dark:text-gray-100
                                bg-gray-100 dark:bg-gray-800
                                "
                            value="{{ $minutes }}"
                            {{ $minutes == $slot_size ? 'selected' : '' }}
                        >{{ $minutes != 60 ? $minutes . ' mins' : round($minutes/60) . ' hour' }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-16 w-full md:w-3/5">
        <div class="mt-4 w-full min-w-full px-8 flex items-center">
            <div class="w-auto">
                <button
                    type="submit"
                    class="
                        py-2 px-4
                        rounded-md
                        bg-dev-500 text-white
                        hover:bg-dev-600
                        focus:outline-none focus:ring-0 ring-0
                        font-bold text-lg w-36
                        ">
                    Update
                </button>
                <button
                    type="button"
                    @click="window.location='{{ route('dashboard') }}'"
                    class="
                        py-2 px-4
                        rounded-md
                        bg-gray-200 text-gray-700 hover:bg-gray-100
                        dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800
                        border border-gray-500
                        focus:outline-none focus:ring-0 ring-0
                        text-lg w-36 ml-12
                        ">
                    Cancel
                </button>
            </div>
        </div>
    </fieldset>

</form>

@props([
    'green_or_red' => 'green',
    'show_status' => 'false',
    'title' => 'Notification',
    'svg' => 'bell',
    'stroke_color' => 'gray',
    'stroke_width' => '2',
    'color_index' => '500',
    'class' => 'h-8 w-8',
    'numeric_badge' => 'false',
    'badge_color' => 'green',
    'badge_text' => '',
    'tool_dots' => false,
    'tool_dot_postman_api_key' => false,
    'tool_dot_postman_repo' => false
])

<span
    class="relative flex flex-col items-center justify-between"
    title="{{ $title }}">
    <x-ikonate
        svg="{{ $svg }}"
        class="
            {{ $class }}
        "
        stroke_width="{{ $stroke_width }}"
    ></x-ikonate>
    @if($show_status != 'false')
    <span
        class="
            rounded-full
            text-xs text-center font-bold
            text-gray-100
            absolute top-0 right-0
            {{ $numeric_badge == 'false' ? 'h-3 w-3' : 'h-5 w-5' }}
            @if($numeric_badge == 'false')
                {{
                    $green_or_red == 'green'
                    ? 'bg-green-600'
                    : 'bg-red-500'
                }}
            @else
                bg-fnl-700
                -mr-1.5 -mt-1.5 pt-px
            @endif
        ">{{ $badge_text }}
    </span>
    @endif
    @if($tool_dots)
    <span class="flex items-center bottom-0 block mt-1">
        @if($tool_dot_postman_api_key)
        <span
            title="Postman API key is active"
            class="rounded-full text-center h-2 w-2 bg-fnl-700"></span>
        @endif
        @if($tool_dot_postman_repo)
        <span
            title="CircleCI repo is active"
            class="rounded-full text-center h-2 w-2 bg-black/75 dark:bg-gray-600 ml-1"></span>
        @endif
    </span>
    @endif
</span>

@props([
    'svg' => 'bolt',
    'title' => 'bolt',
    'class' => '',
    'stroke_width' => '2',
])
<x-icon
    name="{{ $svg }}"
    title="{{ $title }}"
    class="stroke-{{ $stroke_width }} {{ $class }}" />

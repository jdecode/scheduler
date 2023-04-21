@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-100 dark:bg-gray-800 rounded-md shadow-sm border-gray-300 focus:border-dev-300 focus:ring focus:ring-dev-200 focus:ring-opacity-50']) !!}>

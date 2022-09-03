<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark h-full"
      xmlns:x-bind="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/svg+xml" href="{{ asset('images/ikonate-orange-svg/bolt.svg') }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bladewind/css/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('bladewind/css/bladewind-ui.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/outlined.css') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/devicon-base.css') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="h-full font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen flex flex-col justify-between container-fluid mx-auto">
        <script type="text/javascript" src="{{ asset('bladewind/js/helpers.js') }}"></script>
        <div
            x-data="{
                    showMobileSidebar: false,
                    sidebarCollapsed: false,
                    collapseSidebar() {
                        this.sidebarCollapsed = true
                    },
                    uncollapseSidebar() {
                        this.sidebarCollapsed = false
                    }
                }"
            @keydown.shift.left.document="collapseSidebar()"
            @keydown.shift.right.document="uncollapseSidebar()"
        >
            <x-full-width.mobile-sidebar></x-full-width.mobile-sidebar>
            <x-full-width.desktop-sidebar></x-full-width.desktop-sidebar>
            <div class="w-full flex flex-col flex-1"
                 x-bind:class="sidebarCollapsed ? 'md:pl-20' : 'md:pl-64'"
            >
                <x-full-width.top-bar></x-full-width.top-bar>
                <main>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <x-footer></x-footer>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark h-full"
      xmlns:x-bind="http://www.w3.org/1999/xhtml" xmlns:x-on="http://www.w3.org/1999/xhtml">
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
                    },
                    notification_show: false,
                    notification_success: false,
                    notification_content: '-',
                    openNotification(content, success = true) {
                        this.notification_content = content
                        this.notification_success = success
                        this.notification_show = true
                        setTimeout(() => {
                            this.closeNotification()
                        }, 5000)
                    },
                    closeNotification() {
                        this.notification_show = false
                    }
                }"
            @keydown.shift.left.document="collapseSidebar()"
            @keydown.shift.right.document="uncollapseSidebar()"
            x-on:open-notification="openNotification($event.detail.content)"
            x-on:close-notification="closeNotification()"
        >
            @auth
                <x-full-width.mobile-sidebar></x-full-width.mobile-sidebar>
                <x-full-width.desktop-sidebar></x-full-width.desktop-sidebar>
            @endauth
            <div
                class="w-full flex flex-col flex-1"
                @auth
                    x-bind:class="sidebarCollapsed ? 'md:pl-20' : 'md:pl-64'"
                @else
                    :class="'md:pl-0'"
                @endauth
                >
                @auth
                    <x-full-width.top-bar></x-full-width.top-bar>
                @endauth
                <main>
                    <div class="py-1">
                        @auth
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                        @endauth
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
            <x-custom.notifications></x-custom.notifications>
        </div>
        <x-footer></x-footer>
    </body>
</html>

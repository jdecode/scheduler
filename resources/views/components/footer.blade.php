<footer
    class="
        w-full max-w-container mx-auto
        border-t border-gray-300 dark:border-gray-800
        py-10 text-center
        text-sm text-gray-500
        flex flex-col items-center justify-center space-y-2
    "
    >
    <p>
        <a
            class="hover:underline flex items-center justify-center relative"
            title="GitHub repo [new tab]"
            href="https://github.com/jdecode/hackathonify/tree/lightning-scheduler"
            target="_blank">
            <span>Lightning Scheduler </span>
            <x-svg-icon
                svg="bolt"
                title="Lightning Scheduler"
                class="stroke-fnl-500 absolute right-0 top-0 -mr-8 -mt-3"></x-svg-icon>
            <x-svg-icon
                svg="bolt"
                title="Ligtning Scheduler"
                class="stroke-fnl-500 absolute right-0 top-0 -mr-8 -mt-3 animate-ping opacity-75"></x-svg-icon>
        </a>
    </p>
    <p>
    </p>
    <p class="mt-2 clear-both">
        Built with
        <span class="text-fnl-500 text-lg">&hearts;</span>
        using
        <a href="https://laravel.com" target="_blank" class="underline text-gray-500 font-bold">Laravel</a>
        and
        <a href="https://tailwindcss.com" target="_blank" class="underline font-bold text-gray-500">Tailwind CSS</a>
        by
        <a href="https://github.com/jdecode" target="_blank" class="font-bold underline underline-offset-2">
            <span class="text-fnl-500">jdecode</span>
        </a>
    </p>
    <p class="mt-2 clear-both">
        <a href="{{ \Illuminate\Support\Facades\URL::route('pages.terms-of-service') }}" class="">Terms of service</a>
        |
        <a href="{{ \Illuminate\Support\Facades\URL::route('pages.privacy-policy') }}" class="">Privacy Policy</a>
    </p>
</footer>

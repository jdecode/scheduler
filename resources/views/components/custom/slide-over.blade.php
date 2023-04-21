<div
    class="relative z-10"
    role="dialog"
    aria-modal="true"
    x-show="projector"
    @keyup.escape.window="$dispatch('close-projector')"
    >

    <div
        class="
            fixed inset-0
            bg-gray-300/50 dark:bg-gray-600/50
            backdrop-blur-sm
        "
        x-show="projector"
        x-transition:enter="transform transition ease-in-out duration-75"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transform transition ease-in-out duration-75"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none bg-gray-100 dark:bg-gray-900 fixed inset-y-0 right-0 flex max-w-full">
                <div
                    class="
                        pointer-events-auto w-screen max-w-md
                    "
                    x-show="projector"
                    x-transition:enter="transform transition ease-in-out duration-75"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transform transition ease-in-out duration-75"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"

                    @click.outside="$dispatch('close-projector')"
                    >
                    <form
                        class="flex h-full flex-col shadow-xl"
                        method="POST"
                        :action="form_action"
                        >
                        @csrf
                        @method('PUT')
                        <div class="h-0 flex-1 overflow-y-auto">
                            <div class="bg-dev-700 py-6 px-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg text-lg font-bold">
                                        <span x-text="project_name"></span>
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" @click="$dispatch('close-projector')" class="rounded-md bg-dev-700 text-dev-200 focus:outline-none focus:ring-2 focus:ring-white">
                                            <span class="sr-only">Close panel</span>
                                            <x-svg-icon
                                                svg="close"
                                                title="Close"
                                                class="
                                                    w-6 h-6
                                                    fill-gray-800 dark:fill-gray-100
                                                    stroke-gray-800 dark:stroke-gray-100
                                                "
                                            ></x-svg-icon>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-1 flex-col justify-between">
                                <div class="px-4 sm:px-6">
                                    <div class="space-y-6 pt-6 pb-5">
                                        <div>
                                            <label for="postman_api_key" class="block text-sm font-medium ">Postman API key </label>
                                            <div class="mt-1">
                                                <input
                                                    x-ref="postman_api_key"
                                                    :value="postman_api_key"
                                                    x-model="postman_api_key"
                                                    type="text"
                                                    name="postman_api_key"
                                                    id="postman_api_key"
                                                    class="
                                                        block w-full rounded-md
                                                        border-gray-500 shadow-sm focus:border-dev-500 focus:ring-dev-500 sm:text-sm
                                                        text-gray-900 bg-gray-100 dark:text-gray-100 dark:bg-gray-900
                                                    ">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="postman_repo" class="block text-sm font-medium ">CircleCI repo </label>
                                            <div class="mt-1">
                                                <input
                                                    x-ref="postman_repo"
                                                    :value="postman_repo"
                                                    x-model="postman_repo"
                                                    type="text"
                                                    name="postman_repo"
                                                    id="postman_repo"
                                                    class="
                                                        block w-full rounded-md
                                                        border-gray-500 shadow-sm focus:border-dev-500 focus:ring-dev-500 sm:text-sm
                                                        text-gray-900 bg-gray-100 dark:text-gray-100 dark:bg-gray-900
                                                    ">
                                                <p class="text-gray-500 dark:text-gray-600 text-sm">
                                                    founderandlightning/<span
                                                        class="text-gray-700 dark:text-gray-300"
                                                        x-text="postman_repo"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="circleci_job_name" class="block text-sm font-medium ">CircleCI Job name </label>
                                            <div class="mt-1">
                                                <input
                                                    x-ref="circleci_job_name"
                                                    :value="circleci_job_name"
                                                    x-model="circleci_job_name"
                                                    type="text"
                                                    name="circleci_job_name"
                                                    id="circleci_job_name"
                                                    class="
                                                        block w-full rounded-md
                                                        border-gray-500 shadow-sm focus:border-dev-500 focus:ring-dev-500 sm:text-sm
                                                        text-gray-900 bg-gray-100 dark:text-gray-100 dark:bg-gray-900
                                                    ">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="circleci_build_name" class="block text-sm font-medium ">CircleCI Build step name </label>
                                            <div class="mt-1">
                                                <input
                                                    x-ref="circleci_build_name"
                                                    :value="circleci_build_name"
                                                    x-model="circleci_build_name"
                                                    type="text"
                                                    name="circleci_build_name"
                                                    id="circleci_build_name"
                                                    class="
                                                        block w-full rounded-md
                                                        border-gray-500 shadow-sm focus:border-dev-500 focus:ring-dev-500 sm:text-sm
                                                        text-gray-900 bg-gray-100 dark:text-gray-100 dark:bg-gray-900
                                                    ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 justify-start px-4 py-4">
                            <button
                                type="button"
                                title="Save"
                                @click="$dispatch('save-projector')"
                                class="inline-flex justify-center rounded-md border border-transparent bg-dev-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-dev-700 focus:outline-none focus:ring-2 focus:ring-dev-500 focus:ring-offset-2">Save</button>
                            <button
                                @click="$dispatch('close-projector')"
                                type="button"
                                class="
                                    ml-4 py-2 px-4
                                    rounded-md shadow-sm font-medium text-sm font-medium shadow-sm
                                    bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-50
                                    border border-gray-500
                                    focus:outline-none focus:ring-2 focus:ring-dev-500 focus:ring-offset-2
                                "
                            >Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

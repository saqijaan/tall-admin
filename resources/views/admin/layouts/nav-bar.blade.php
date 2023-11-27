<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div
        class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        <button
            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            @click="toggleSideMenu"
            aria-label="Menu">
            <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd">
                </path>
            </svg>
        </button>
        <div class="flex justify-start flex-1 text-2xl font-bold lg:mr-32 text-gray-800">
            {{ $title ?? '' }}
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Theme toggler -->
            <li class="flex">
                {{-- <x-admin.components.theme-toggler /> --}}
            </li>
            <!-- Notifications menu -->
            <li class="relative">
                {{-- <x-admin.components.notifications /> --}}
            </li>
            <!-- Profile menu -->
            <li class="relative">
                <div
                    class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                    aria-label="Account"
                    aria-haspopup="true">
                    <img
                        class="object-cover w-8 h-8 rounded-full"
                        src="{{ auth()->user()->profileImage }}"
                        alt=""
                        aria-hidden="true" />
                </div>
            </li>
        </ul>
    </div>
</header>

<div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

    <x-admin.side-bar />

    <div class="flex flex-col flex-1 w-full">

        <x-admin.nav-bar :title="$title ?? ''" />

        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid {{ $topPadding ?? 'py-6' }}">

                <div class="flex items-center justify-between">
                    <strong class="text-lg font-bold md:text-2xl dark:text-white">
                        @yield('page_title', '')
                    </strong>

                    {{ $actionButton ?? '' }}

                </div>

                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs py-4">
                    {{ $slot ?? '' }}
                    @yield('page')
                </div>
            </div>
        </main>
    </div>
</div>

<div class="flex">
    <aside class="z-20 w-64 hidden overflow-y-auto bg-white dark:bg-gray-800 md:block">
        <div class="flex flex-col h-full">
            <div class="py-4 text-gray-500 dark:text-gray-400 flex flex-col grow">
                <a
                    class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                    href="#">
                    {!! $appName !!}
                </a>
                <ul class="mt-6">
                    <x-admin.menu name="main" current="{{ request()->route()->getName() }}">
                        @foreach ($component->items as $item)
                            @can($item->permission)
                                @include('admin.layouts.menu-item')
                            @endcan
                        @endforeach
                    </x-admin.menu>
                </ul>
            </div>
            @include('admin.layouts.side-bar-profile')
        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div
        x-cloak
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#">
                {!! $appName !!}
            </a>
            <ul class="mt-6">
                <x-admin.menu name="main" current="{{ request()->route()->getName() }}">
                    @foreach ($component->items as $item)
                        @can($item->permission)
                            @include('admin.layouts.menu-item')
                        @endcan
                    @endforeach
                </x-admin.menu>
            </ul>
        </div>
    </aside>
</div>

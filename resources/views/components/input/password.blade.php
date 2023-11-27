<div class="flex flex-col items-start justify-start w-full" x-data="{
    type: 'password'
}">
    <div class="flex justify-between items-center w-full">
        @if ($attributes->has('label'))
            <label for="email" class="block text-sm mb-2 dark:text-white">{{ $attributes->get('label') }}</label>
        @endif

        @if ($attributes->has('forgot-link'))
            <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" wire:navigate href="{{ $attributes->get('forgot-link', '#') }}">{{ $attributes->get('forgot-label', 'Forgot password?') }}</a>
        @endif
    </div>
    <div class="relative flex justify-start w-full">
        <input autocomplete="new-password" {{ $attributes->except('type')->merge([
                'class' => 'grow py-3 px-4 pr-10 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600',
            ])->class([
                'border-red-400' => !!$error,
            ]) }}
            maxlength="255"
            :type="type">

        <div class="flex items-center absolute right-2 h-full" x-cloak>
            <button type="button" class="ml-2 text-red-400" x-on:click="type = 'password'" x-show="type == 'text'">
                <x-icon ref="eye-off" style="solid" class="w-6" />
            </button>
            <button type="button" class="ml-2 text-gray-300 hover:text-gray-400" x-on:click="type = 'text'" x-show="type == 'password'">
                <x-icon ref="eye" style="solid" class="w-6" />
            </button>
        </div>
    </div>
    @error($attributes->get('name'))
        <p class="text-xs text-red-600 mt-2" id="{{ $attributes->get('id') }}-error">
            {{ $message }}
        </p>
    @enderror
</div>

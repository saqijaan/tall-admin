<div class="relative">
    @if ($attributes->has('label'))
        <label for="email" class="block text-sm mb-2 dark:text-white">{{ $attributes->get('label') }}</label>
    @endif
    <input {{ $attributes->merge([
            'type' => 'text',
            'aria-describedby' => 'email-error',
            'class' => 'py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600',
        ])->class([
            'border-red-400 pr-[37px]' => !!$error,
        ]) }}>
    <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
        <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
        </svg>
    </div>
    @error($attributes->get('name'))
        <p class="text-xs text-red-600 mt-2" id="{{ $attributes->get('id') }}-error">
            {{ $message }}
        </p>
    @enderror
</div>

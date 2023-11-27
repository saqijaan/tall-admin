<div class="p-4 sm:p-7">
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Remember your password?
            <a wire:navigate href="{{ route('admin.login') }}" class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Sign in here
            </a>
        </p>
    </div>

    <div class="mt-5">
        <!-- Form -->
        <form wire:submit="submit">
            <div class="grid gap-y-4">

                <x-input.text wire:model="forgotPasswordForm.email" name="forgotPasswordForm.email" id="forgotPasswordForm.email" placeholder="Email address" label="Email address" />

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Reset password</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>

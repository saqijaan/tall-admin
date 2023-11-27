<div class="p-4 sm:p-7">
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Reset Password</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Remember your password?
            <a wire:navigate href="{{ route('admin.login') }}" class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Sign in here
            </a>
        </p>
    </div>

    <div class="mt-5">
        <!-- Form -->
        <form wire:submit="resetPassword">
            <div class="grid gap-y-4">

                <x-input.text type="email" name="username" id="username" class="hidden" autocomplete="username" />

                <x-input.password wire:model="resetForm.password" autocomplete="new-password" name="resetForm.password" id="resetForm.password" placeholder="Password" label="New Password" />

                <x-input.password wire:model="resetForm.password_confirmation" autocomplete="confirm-password" name="resetForm.password_confirmation" id="resetForm.password_confirmation" placeholder="Confirm Password" label="Confirm Password" />

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Reset password</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>

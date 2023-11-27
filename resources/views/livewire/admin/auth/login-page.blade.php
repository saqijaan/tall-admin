<div class="p-4 sm:p-7">
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Don't have an account yet?
            <a wire:navigate href="{{ route('admin.register') }}" class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Sign up here
            </a>
        </p>
    </div>

    <div class="mt-5">
        <x-button.google-login label="Sign in with Google" wire:click="loginWithGoogle" />

        <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">Or</div>

        <!-- Form -->
        <form wire:submit="login">
            <div class="grid gap-y-4">
                <x-input.text wire:model="loginForm.email" autocomplete="username" name="loginForm.email" id="loginForm.email" placeholder="Email address" label="Email address" />

                <x-input.password wire:model="loginForm.password" name="loginForm.password" id="loginForm.password" placeholder="Enter password" label="Passsword" forgot-link="{{ route('admin.forgot-password') }}" />

                <div class="flex">
                    <input wire:model="loginForm.remember" name="remember-me" id="remember-me-checkbox" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="remember-me-checkbox" class="text-sm text-gray-500 ms-3 dark:text-gray-400">Remember me</label>
                </div>

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign in</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>

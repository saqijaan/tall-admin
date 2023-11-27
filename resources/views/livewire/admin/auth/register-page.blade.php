<div class="p-4 sm:p-7">
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Already have an account?
            <a wire:navigate href="{{ route('admin.login') }}" class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Sign in here
            </a>
        </p>
    </div>

    <div class="mt-5">

        <x-button.google-login label="Sign up with Google" wire:click="loginWithGoogle" />

        <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">Or</div>

        <!-- Form -->
        <form wire:submit="registerUser">
            <div class="grid gap-y-4">

                <x-input.text wire:model="registrationForm.name" autocomplete="name" name="registrationForm.name" id="registrationForm.name" placeholder="Full name" label="Full name" />

                <x-input.text wire:model="registrationForm.email" autocomplete="username" name="registrationForm.email" id="registrationForm.email" placeholder="Email address" label="Email address" />

                <x-input.password wire:model="registrationForm.password" name="registrationForm.password" id="registrationForm.password" placeholder="Enter password" label="Passsword" />

                <x-input.password wire:model="registrationForm.password_confirmation" name="registrationForm.password_confirmation" id="registrationForm.password_confirmation" placeholder="Confirm password" label="Confirm Passsword" />

                <!-- Checkbox -->
                <div class="flex items-center">
                    <div class="flex">
                        <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    </div>
                    <div class="ms-3">
                        <label for="remember-me" class="text-sm dark:text-white">I accept the <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Terms and Conditions</a></label>
                    </div>
                </div>
                <!-- End Checkbox -->

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign up</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>

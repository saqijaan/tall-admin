<?php

namespace App\Services\Admin;

use App\Livewire\Traits\Notifies;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginService
{
    use Notifies;

    public function __invoke(): RedirectResponse
    {

        $googleUser = Socialite::driver('google')->user();

        /** @var User */
        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
            'google_id' => $googleUser->getId()
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt($googleUser->getId()),
            'google_id' => $googleUser->getId()
        ]);

        $user->clearMediaCollection('profile');
        $user->addMediaFromUrl($googleUser->getAvatar())->toMediaCollection('profile');

        auth()->login($user);

        session()->put('notify.message', 'You have been logged in.');

        return redirect()->route('admin.dashboard');
    }
}

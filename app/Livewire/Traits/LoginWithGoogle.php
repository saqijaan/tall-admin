<?php

namespace App\Livewire\Traits;

use Laravel\Socialite\Facades\Socialite;

trait LoginWithGoogle
{
    public function loginWithGoogle()
    {
        $redirectUrl = Socialite::driver('google')->redirect()->getTargetUrl();
        return $this->redirect($redirectUrl);
    }
}

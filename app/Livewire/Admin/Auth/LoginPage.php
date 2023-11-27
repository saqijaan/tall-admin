<?php

namespace App\Livewire\Admin\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Livewire\Traits\LoginWithGoogle;
use App\Livewire\Traits\Notifies;
use Livewire\Component;

class LoginPage extends Component
{
    use Notifies,
        LoginWithGoogle;

    public LoginForm $loginForm;

    public function render()
    {
        return view('livewire.admin.auth.login-page');
    }

    public function login()
    {
        if (!$this->loginForm->login()) {
            return $this->notify('Invalid credentials.', level: 'error');
        }

        return $this->notify('You have been logged in.', 'admin.dashboard');
    }
}

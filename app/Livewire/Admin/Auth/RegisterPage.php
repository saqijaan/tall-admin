<?php

namespace App\Livewire\Admin\Auth;

use App\Livewire\Forms\Auth\RegistrationForm;
use App\Livewire\Traits\LoginWithGoogle;
use App\Livewire\Traits\Notifies;
use Livewire\Component;

class RegisterPage extends Component
{
    use Notifies,
        LoginWithGoogle;

    public RegistrationForm $registrationForm;

    public function render()
    {
        return view('livewire.admin.auth.register-page');
    }

    public function registerUser()
    {
        $this->registrationForm->register();

        return $this->notify('Your account has been created.', 'admin.login');
    }
}

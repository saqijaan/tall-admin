<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Form;
use Livewire\Attributes\Validate;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|max:100')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    public function login(): bool
    {
        $this->validate();

        $loggedIn = auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember);

        if (!$loggedIn) {
            $this->addError('email', 'Invalid credentials.');
        }

        return $loggedIn;
    }
}

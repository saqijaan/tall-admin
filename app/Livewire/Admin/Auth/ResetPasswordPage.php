<?php

namespace App\Livewire\Admin\Auth;

use App\Livewire\Forms\Auth\ResetForm;
use App\Livewire\Traits\Notifies;
use App\Models\User;
use Livewire\Component;

class ResetPasswordPage extends Component
{
    use Notifies;

    public string $token = '';

    public ResetForm $resetForm;

    public function mount(string $token)
    {
        abort_if(!User::findByResetPasswordToken($token), 410, "This password reset token is invalid.");

        $this->token = $token;

        $this->resetForm->token = $token;
    }

    public function render()
    {
        return view('livewire.admin.auth.reset-password-page');
    }

    public function resetPassword()
    {
        $this->resetForm->resetPassword();

        return $this->notify('Your password has been reset.', 'admin.login');
    }
}

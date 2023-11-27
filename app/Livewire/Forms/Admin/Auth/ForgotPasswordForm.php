<?php

namespace App\Livewire\Forms\Admin\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Form;
use Livewire\Attributes\Validate;

class ForgotPasswordForm extends Form
{
    #[Validate('required|email')]
    public string $email = '';

    public function sendResetLinkEmail(): bool
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        $isNotificationSent = $status === Password::RESET_LINK_SENT;

        if (!$isNotificationSent) {
            $this->addError('email', __($status));
        }

        if ($isNotificationSent) {
            $this->reset('email');
        }

        return $isNotificationSent;
    }
}

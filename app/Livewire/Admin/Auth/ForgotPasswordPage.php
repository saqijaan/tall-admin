<?php

namespace App\Livewire\Admin\Auth;

use App\Livewire\Forms\Admin\Auth\ForgotPasswordForm;
use App\Livewire\Traits\Notifies;
use Livewire\Component;

class ForgotPasswordPage extends Component
{
    use Notifies;

    public ForgotPasswordForm $forgotPasswordForm;

    public function render()
    {
        return view('livewire.admin.auth.forgot-password-page');
    }

    public function submit()
    {
        if (!$this->forgotPasswordForm->sendResetLinkEmail()) {
            return $this->notify('Cannot send reset link. Please try again.', level: 'error');
        }

        $this->notify('Reset link sent successfully. Please check your email.', level: 'success');
    }
}

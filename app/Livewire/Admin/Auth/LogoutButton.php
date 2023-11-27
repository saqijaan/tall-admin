<?php

namespace App\Livewire\Admin\Auth;

use App\Livewire\Traits\Notifies;
use Livewire\Component;

class LogoutButton extends Component
{
    use Notifies;

    public function render()
    {
        return view('livewire.admin.auth.logout-button');
    }

    public function logout()
    {
        auth()->logout();

        session()->regenerate();

        return $this->notify('You have been logged out.', 'admin.login');
    }
}

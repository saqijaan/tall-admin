<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class DashboardPage extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-page');
    }
}

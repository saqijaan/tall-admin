<?php

namespace App\Livewire\Traits;

trait ResetsPagination
{
    public function updated(): void
    {
        $this->resetPage();
    }
}

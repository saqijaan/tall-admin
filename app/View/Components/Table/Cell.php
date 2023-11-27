<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Cell extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell');
    }
}

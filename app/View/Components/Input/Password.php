<?php

namespace App\View\Components\Input;

class Password extends Text
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.password');
    }
}

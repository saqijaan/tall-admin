<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class CheckboxButton extends Component
{
    /**
     * Whether the toggle should be in an on state.
     *
     * @var bool
     */
    public $on = false;

    /**
     * Whether the toggle should be disabled.
     *
     * @var bool
     */
    public $disabled = false;

    /**
     * Create the component instance.
     *
     * @param  bool  $on
     * @param  bool  $disabled
     */
    public function __construct($on = false, $disabled = false)
    {
        $this->on = $on;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.checkbox-button');
    }
}

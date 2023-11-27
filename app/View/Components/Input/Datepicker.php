<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Datepicker extends Component
{
    /**
     * Whether or not the input has an error to show.
     *
     * @var bool
     */
    public bool $error = false;

    /**
     * Whether the datepicker should support time.
     *
     * @var bool
     */
    public bool $enableTime = false;

    /**
     * Initialise the component.
     *
     * @param  bool  $error
     */
    public function __construct($error = false, bool $enableTime = false)
    {
        $this->error = $error;

        $this->enableTime = $enableTime;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.datepicker');
    }
}

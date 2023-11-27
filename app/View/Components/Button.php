<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Specify the HTML tag the component should render.
     *
     * @var string
     */
    public $tag = 'button';

    /**
     * The button theme.
     *
     * @var string
     */
    public $theme = 'default';

    /**
     * @var string
     */
    public $size = 'default';

    /**
     * Initialise the component.
     *
     * @param  string  $tag
     * @param  string  $theme
     * @param  string  $size
     */
    public function __construct($tag = 'button', $theme = 'default', $size = 'default')
    {
        $this->tag = $tag;
        $this->theme = $theme;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}

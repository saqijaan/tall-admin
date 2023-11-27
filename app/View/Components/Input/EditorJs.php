<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class EditorJs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $editorProperty,
        public ?string $editorId = null
    ) {
        $this->editorId = 'editor' . Str::random(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.editor-js');
    }
}

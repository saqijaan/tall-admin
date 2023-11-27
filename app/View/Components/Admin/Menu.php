<?php

namespace App\View\Components\Admin;

use App\Services\Admin\MenuService;
use Exception;
use Illuminate\View\Component;

class Menu extends Component
{
    public $name;

    public $items;

    public function __construct($name)
    {
        $this->name = $name;
        $menu = MenuService::menu($name);

        if (!$menu) {
            throw new Exception("Menu {$name} not registered. Please check name or register a menu with this name.");
        }

        $this->items = $menu->getItems();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.menu');
    }
}

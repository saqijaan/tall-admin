<?php

namespace App\Menu;

use Closure;
use Illuminate\Support\Collection;

class Menu
{
    private Collection $items;

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->items = collect();
    }

    public static function make($name)
    {
        return new self($name);
    }

    public function addItem(Closure $callback)
    {
        $item = tap(new MenuItem(), $callback);

        $this->items->add($item);

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}

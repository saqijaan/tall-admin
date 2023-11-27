<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IconLoader
{
    public static function icon($icon, $attrs = null, $style = 'outline')
    {
        if ($attrs) {
            $attrs = " {$attrs} ";
        }

        if (Str::startsWith($icon, '<svg')) {
            return str_replace('<svg', sprintf('<svg%s', $attrs), $icon);
        }

        $iconPath = resource_path("icons/{$style}/$icon.svg");

        if (! File::exists($iconPath)) {
            return;
        }

        return str_replace('<svg', sprintf('<svg%s', $attrs), File::get($iconPath));
    }

    public static function paymentIcons()
    {
        return File::get(
            resource_path('icons/payment_icons.svg')
        );
    }
}

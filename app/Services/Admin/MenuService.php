<?php

namespace App\Services\Admin;

use App\Menu\Menu;
use App\Menu\MenuItem;
use Illuminate\Support\Collection;

class MenuService
{
    public static function menu(string $name): Menu
    {
        return (new self)->get($name);
    }

    public function get(string $name): Menu
    {
        /** @var \App\Menu\Menu */
        $menu = $this->getMenuList()->where('name', $name)->first();
        return $menu;
    }

    private function getMenuList(): Collection
    {
        return collect([
            /**
             * Main Sidebar Menu
             */
            Menu::make('main')
                ->addItem(function (MenuItem $item) {
                    $item->name('Dashboard')
                        ->handle('admin.dashboard')
                        // ->permission('admin:dashboard')
                        ->icon('chart-square-bar')
                        ->route('admin.dashboard');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Projects')
                        ->handle('admin.project')
                        ->permission('projects')
                        ->icon('cube')
                        ->route('admin.project.index');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('System')
                        ->handle('admin.system')
                        ->permission('system')
                        ->icon('cog')
                        ->route('admin.system.user.index');
                }),

            /**
             * System Menu
             */
            Menu::make('projects')
                ->addItem(function (MenuItem $item) {
                    $item->name('Designs')
                        ->handle('admin.project.design.index')
                        ->route('admin.project.design.index')
                        ->permission('projects:manage-designs')
                        ->icon('user');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Content')
                        ->handle('admin.project.content.index')
                        ->route('admin.project.content.index')
                        ->permission('system:manage-roles')
                        ->icon('star');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Third Parties')
                        ->handle('admin.project.third-party.index')
                        ->route('admin.project.third-party.index')
                        ->permission('projects:manage-third-parties')
                        ->icon('users');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Tasks')
                        ->handle('admin.project.task.index')
                        ->route('admin.project.task.index')
                        ->permission('projects:manage-tasks')
                        ->icon('users');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Time Logs')
                        ->handle('admin.project.time-log.index')
                        ->route('admin.project.time-log.index')
                        ->permission('projects:manage-time-logs')
                        ->icon('users');
                }),

            /**
             * System Menu
             */
            Menu::make('system')
                ->addItem(function (MenuItem $item) {
                    $item->name('Users')
                        ->handle('admin.system.user')
                        ->route('admin.system.user.index')
                        ->permission('system:manage-role')
                        ->icon('user');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Roles')
                        ->handle('admin.system.role')
                        ->route('admin.system.role.index')
                        ->permission('system:manage-roles')
                        ->icon('star');
                })
                ->addItem(function (MenuItem $item) {
                    $item->name('Teams')
                        ->handle('admin.system.team')
                        ->route('admin.system.team.index')
                        ->permission('system:manage-teams')
                        ->icon('users');
                }),
        ]);
    }
}

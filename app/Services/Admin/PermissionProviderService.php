<?php

namespace App\Services\Admin;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;

class PermissionProviderService
{
    private $configPermissions;

    private $dataBasePermissions;

    public function __construct()
    {
        $this->configPermissions = config('admin.permissions', []);
        // dd($this->configPermissions);
        $this->dataBasePermissions = $this->getDbToConfigMappedPermissions();
    }

    public static function make(): self
    {
        return new self;
    }

    public function registerAllPermissions()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->clearCachedPermissions();

        $permissions = collect($this->configPermissions);

        foreach ($permissions as $permission) {
            Permission::firstOrNew([
                'name' => $permission['handle'],
                'guard_name' => 'admin',
            ])->fill([
                'name' => $permission['handle'],
                'guard_name' => 'admin',
            ])->save();
        }
    }

    /**
     * Returns permissions grouped by their handle
     * For example, settings:channel would become a child of settings.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getGroupedPermissions(): Collection
    {
        $permissions = $this->dataBasePermissions;

        foreach ($permissions as $key => $permission) {
            $parent = $this->getParentPermission($permission);

            if ($parent) {
                $parent->children->push($permission);
                $permissions->forget($key);
            }
        }

        return $permissions;
    }

    /**
     * Returns the parent permission based on handle naming.
     *
     * @param  Permission  $permission
     * @return null|\Spatie\Permission\Models\Permission;
     */
    protected function getParentPermission($permission)
    {
        $crumbs = explode(':', $permission->handle);

        if (empty($crumbs[1])) {
            return null;
        }

        return $this->dataBasePermissions->first(fn ($parent) => $parent['handle'] === $crumbs[0]);
    }

    protected function getDbToConfigMappedPermissions()
    {
        return $this->getCachedPermissions()->map(function (Permission $permission) {
            $permission->children = collect();
            $permission->handle = $permission->name;
            $configPermission = collect($this->configPermissions)->first(fn ($perm) => $perm['handle'] == $permission->name);
            if ($configPermission) {
                $permission->name = $configPermission['name'];
                $permission->description = $configPermission['description'];

                return $permission;
            }

            $permission->delete();
            $this->updateCachedPermissions();
        })->filter();
    }

    public function getCachedPermissions(): Collection
    {
        return Cache::rememberForever('database-permissions', function () {
            return Permission::query()->select('name')->get();
        });
    }

    public function clearCachedPermissions(): self
    {
        Cache::forget('database-permissions');
        return $this;
    }

    public function updateCachedPermissions(): self
    {
        $this->clearCachedPermissions();
        $this->getCachedPermissions();
        return $this;
    }
}

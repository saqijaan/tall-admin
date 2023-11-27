<?php

namespace App\Console\Commands\System;

use App\Services\Admin\PermissionProviderService;
use Illuminate\Console\Command;

class UpdatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:update-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Permissions from configuration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Updating Permissions');
        PermissionProviderService::make()->registerAllPermissions();

        $this->info('Permissions Updated');

        return 0;
    }
}

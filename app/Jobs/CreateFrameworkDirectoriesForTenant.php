<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;

class CreateFrameworkDirectoriesForTenant
{
    public function __construct(protected Tenant $tenant)
    {
    }

    public function handle()
    {
        $this->tenant->run(function ($tenant) {
            $storage_path = storage_path();

            mkdir("$storage_path/framework/cache", 0777, true);
        });
    }
}

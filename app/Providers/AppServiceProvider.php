<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Features\SupportFileUploads\FilePreviewController;
use Livewire\Livewire;
use Stancl\Tenancy\Controllers\TenantAssetsController;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $this->configureLivewireForTenancy();
    }

    private function configureLivewireForTenancy(): void
    {
        // https://tenancyforlaravel.com/docs/v3/tenancy-bootstrappers/#filesystem-tenancy-boostrapper
        TenantAssetsController::$tenancyMiddleware = InitializeTenancyBySubdomain::class;

        // livewire 3 compatible
        // https://tenancyforlaravel.com/docs/v3/integrations/livewire
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle)
                ->middleware(
                    'web',
                    'universal',
                    InitializeTenancyBySubdomain::class
                );
        });

        // https://tenancyforlaravel.com/docs/v3/integrations/livewire
        FilePreviewController::$middleware = [
            'web',
            'universal',
            InitializeTenancyBySubdomain::class
        ];
    }
}

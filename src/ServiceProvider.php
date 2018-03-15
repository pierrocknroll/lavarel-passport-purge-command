<?php

namespace Pierrocknroll\LavarelPassportPurgeCommand;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->commands([
            Console\Commands\PurgeOldTokens::class,
        ]);
    }
}

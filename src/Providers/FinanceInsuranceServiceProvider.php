<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Providers;

use Fatgeek\FinanceInsuranceApiSdk\Services\FinanceInsuranceService;
use Illuminate\Support\ServiceProvider;

class FinanceInsuranceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(FinanceInsuranceService::class);

        $this->registerPublishableConfigs();
    }

    /**
     * @return void
     */
    private function registerPublishableConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/finance-insurance.php' => config_path('finance-insurance.php')
        ], 'finance-insurance');
    }
}
<?php

namespace App\Providers;

use App\Domain\Sample\Repositories\SampleRepository;
use App\Domain\Sample\Repositories\SampleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SampleRepositoryInterface::class,
            SampleRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Repositories\Interfaces\SampleInterface;
use App\Repositories\SampleRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SampleInterface::class,
            SampleRepositories::class
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

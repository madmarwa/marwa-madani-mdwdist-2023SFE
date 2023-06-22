<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\ExamRepositoryInterface;
use App\Repository\ExamRepository;
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
    }
}

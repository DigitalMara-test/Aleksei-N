<?php

namespace App\Providers;

use App\Domain\Tasks\Contracts\TaskRepository;
use App\Infrastructure\Tasks\EloquentTaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepository::class, EloquentTaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

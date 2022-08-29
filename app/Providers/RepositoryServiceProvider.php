<?php

namespace App\Providers;

use App\Interfaces\StudentRepository;
use App\Repositories\StudentRepositoryImpl;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StudentRepository::class, StudentRepositoryImpl::class);
    }
}

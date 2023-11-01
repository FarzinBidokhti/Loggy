<?php

namespace FarzinBidokhti\Loggy;

use Illuminate\Support\ServiceProvider;

class LoggyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }

    public function register()
    {
    }
}

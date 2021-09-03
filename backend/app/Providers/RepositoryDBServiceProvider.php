<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryDBServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\DB\ChannelRepository::class,
            \App\Repositories\DB\IChannelRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

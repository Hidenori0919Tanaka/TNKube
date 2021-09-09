<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\API\Serch\SerchInterfaceRepository::class,
            \App\Repositories\API\Serch\SerchRepository::class
        );
        $this->app->bind(
            \App\Repositories\API\Videos\VideosInterfaceRepository::class,
            \App\Repositories\API\Videos\VideosRepository::class
        );
        $this->app->bind(
            \App\Repositories\API\Channels\ChannelsInterfaceRepository::class,
            \App\Repositories\API\Channels\ChannelsRepository::class
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

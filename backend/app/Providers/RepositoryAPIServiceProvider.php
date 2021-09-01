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
            \App\Repositories\API\VideoSerch\IVideoSerchAPIRepository::class,
            \App\Repositories\API\VideoSerch\VideoSerchAPIRepository::class
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

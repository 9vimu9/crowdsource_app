<?php

namespace App\Providers;

use App\Repositories\v2\paragraphs\MySqlParagraphRepository;
use App\Repositories\v2\paragraphs\ParagraphRepositoryInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CrowdSourceAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParagraphRepositoryInterface::class, function (Application $app) {
            return $app->make(MySqlParagraphRepository::class);
        });
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

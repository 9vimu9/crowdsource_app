<?php

namespace App\Providers;

use App\Repositories\v2\paragraphs\MySqlParagraphRepository;
use App\Repositories\v2\paragraphs\ParagraphRepositoryInterface;
use App\Repositories\v2\questions\MySqlQuestionRepository;
use App\Repositories\v2\questions\QuestionRepositoryInterface;
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

        $this->app->bind(QuestionRepositoryInterface::class, function (Application $app) {
            return $app->make(MySqlQuestionRepository::class);
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

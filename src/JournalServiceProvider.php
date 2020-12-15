<?php

namespace MyVisions\Journal;

use Illuminate\Support\ServiceProvider;
use MyVisions\Journal\Console\InstallJournal;

class JournalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'journal');

        $this->app->bind('article', function($app) {
            return new ArticlePublisher();
        });
    }

    public function boot()
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {

            // Publishing migrations
            if (! class_exists('CreateArticlesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_articles_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_articles_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            if (! class_exists('CreateAuthorsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_authors_table.php.stub' => database_path('migrations/' . date('Y_m-d-His', time()) . '_create_authors_table.php'),
                ]);
            }

            // Publishing config file
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('journal.php'),
            ], 'config');

            $this->commands([
                InstallJournal::class,
            ]);

        }
    }
}
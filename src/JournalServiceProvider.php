<?php

namespace MyVisions\Journal;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use MyVisions\Journal\Console\InstallJournal;
use MyVisions\Journal\Http\Middleware\CapitalizeTitle;

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
        // Load routes
        $this->registerRoutes();

        // load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'journal');

        // Register a route specific Middleware
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('capitalize', CapitalizeTitle::class);
        $router->pushMiddlewareToGroup('web', CapitalizeTitle::class);

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {

            // Publish views
            $this->publishes([
               __DIR__.'/../resources/views' => resource_path('views/vendor/journal')
            ], 'views');

            // Publish assets (js and css)
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('journal'),
            ], 'assets');

            // Publishing migrations
            if (! class_exists('CreateAuthorsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_authors_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_authors_table.php'),
                ], 'migrations');
            }

            if (! class_exists('CreateArticlesCategoriesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_article_categories_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_article_categories_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            if (! class_exists('CreateArticlesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_articles_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_articles_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
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

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('journal.prefix'),
            'middleware' => config('journal.middleware'),
        ];
    }
}
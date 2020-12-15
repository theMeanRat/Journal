<?php

namespace MyVisions\Journal\Tests;

use MyVisions\Journal\JournalServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            JournalServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // import the Tables class from the migration
        include_once __DIR__ . '/../database/migrations/create_articles_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_authors_table.php.stub';

        // run the up() method of that migration class
        (new \CreateArticlesTable)->up();
        (new \CreateAuthorsTable)->up();
    }

}

<?php

namespace MyVisions\Journal\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use MyVisions\Journal\Tests\TestCase;

class InstallJournalTest extends TestCase
{
    /** @test */
    public function the_install_command_copies_the_configuration()
    {
        if (File::exists(config_path('journal.php'))) {
            unlink(config_path('journal.php'));
        }

        $this->assertFalse(File::exists(config_path('journal.php')));

        Artisan::call('journal:install');

        $this->assertTrue(File::exists(config_path('journal.php')));
    }
}
<?php

namespace MyVisions\Journal\Console;

use Illuminate\Console\Command;

class InstallJournal extends Command
{
    protected $signature = 'journal:install';
    protected $description = 'Install the Journal Package';

    public function handle()
    {
        $this->info('Installing Journal...');
        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "MyVisions\Journal\JournalServiceProvider",
            '--tag' => "config"
        ]);

        $this->info('Installed Journal');
    }
}
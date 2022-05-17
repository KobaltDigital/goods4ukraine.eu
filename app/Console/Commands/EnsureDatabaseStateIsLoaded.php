<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnsureDatabaseStateIsLoaded extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ensure-database-state-is-loaded';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make sure all static data is loaded into the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        collect([
            new \App\Database\State\EnsureCategoriesArePresent(),
            new \App\Database\State\EnsureLanguagesArePresent(),
        ])->each->__invoke();
    }
}

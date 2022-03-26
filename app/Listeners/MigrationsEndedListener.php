<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Events\MigrationsEnded;

class MigrationsEndedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MigrationsEnded $event)
    {
        Artisan::call('ensure-database-state-is-loaded');
    }
}

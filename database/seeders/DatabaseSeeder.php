<?php

namespace Database\Seeders;

use Database\Seeders\AdSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Language::create([
            'title' => 'Dutch',
            'locale' => 'nl',
            'locale_long' => 'nl_NL',
        ]);

        \App\Models\Language::create([
            'title' => 'English',
            'locale' => 'gb',
            'locale_long' => 'en_GB',
        ]);

        \App\Models\Language::create([
            'title' => 'український',
            'locale' => 'ua',
            'locale_long' => 'ua_UA',
        ]);
        
        \App\Models\User::factory(1000)->create();
        $this->call(AdSeeder::class);
    }
}

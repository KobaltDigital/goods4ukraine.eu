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
        // Adding dutch language
        \App\Models\Language::create([
            'title' => 'Dutch',
            'locale' => 'nl',
            'locale_long' => 'nl_NL',
        ]);

        // Adding english language
        \App\Models\Language::create([
            'title' => 'English',
            'locale' => 'gb',
            'locale_long' => 'en_GB',
        ]);

        // Adding ukrain language
        \App\Models\Language::create([
            'title' => 'український',
            'locale' => 'ua',
            'locale_long' => 'ua_UA',
        ]);


        \App\Models\User::factory(10)->create();
        $this->call(AdSeeder::class);
    }
}

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

        \App\Models\Language::create([
            'title' => 'Italiano',
            'locale' => 'it',
            'locale_long' => 'it_IT',
        ]);

        \App\Models\Language::create([
            'title' => 'France',
            'locale' => 'fr',
            'locale_long' => 'fr_FR',
        ]);

        \App\Models\Language::create([
            'title' => 'Polski',
            'locale' => 'pl',
            'locale_long' => 'pl_PL',
        ]);
        
        \App\Models\Language::create([
            'title' => 'čeština',
            'locale' => 'cs',
            'locale_long' => 'cs_CS',
        ]);
        
        \App\Models\User::factory(10)->create();
        $this->call(AdSeeder::class);
    }
}

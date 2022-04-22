<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'title' => 'Dutch',
            'locale' => 'nl',
            'locale_long' => 'nl_NL',
        ]);

        Language::create([
            'title' => 'English',
            'locale' => 'en',
            'locale_long' => 'en_GB',
        ]);

        Language::create([
            'title' => 'український',
            'locale' => 'ua',
            'locale_long' => 'ua_UA',
        ]);

        Language::create([
            'title' => 'русский',
            'locale' => 'ru',
            'locale_long' => 'ru_RU',
        ]);
    }
}

<?php

namespace App\Database\State;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class EnsureLanguagesArePresent
{
    private $languages = [
        [
            'title' => 'Nederlands',
            'select_language_title' => 'Ga verder in het Nederlands',
            'locale' => 'nl',
            'locale_long' => 'nl_NL',
        ],
        [
            'title' => 'English',
            'select_language_title' => 'Continue in English',
            'locale' => 'en',
            'locale_long' => 'en_GB',
        ],
        [
            'title' => 'український',
            'select_language_title' => 'Продовжуйте українською',
            'locale' => 'ua',
            'locale_long' => 'ua_UA',
        ],
        [
            'title' => 'русский',
            'select_language_title' => 'Продолжить на русском',
            'locale' => 'ru',
            'locale_long' => 'ru_RU',
        ],
        [
            'title' => 'Français',
            'select_language_title' => 'Continuer en français',
            'locale' => 'fr',
            'locale_long' => 'fr_BE',
        ],
    ];

    public function __invoke()
    {
        if (!Schema::hasTable('languages')) {
            return 0;
        }

        foreach ($this->languages as $language) {
            if ($this->isPresent($language['locale_long'])) {
                continue;
            }

            Language::create($language);
        }
        Cache::forget('language');
    }

    private function isPresent($locale)
    {
        return Language::where('locale_long', $locale)->exists();
    }
}

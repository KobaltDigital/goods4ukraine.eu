<?php

namespace App\Database\State;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class EnsureLanguageSelectiTitlesArePresent
{
    private $selectLanguages = [
        'nl' => 'Ga verder in het Nederlands',
        'en' => 'Continue in English',
        'ua' => 'Продовжуйте українською',
        'ru' => 'Продолжить на русском',
    ];

    public function __invoke()
    {
        if (!Schema::hasTable('languages') || !Schema::hasColumn('languages', 'select_language_title')) {
            return 0;
        }

        $languages = Language::whereNull('select_language_title')->get();

        foreach ($languages as $language) {
            if (Arr::exists($this->selectLanguages, $language->locale)) {
                $language->select_language_title = $this->selectLanguages[$language->locale];
                $language->save();
            }
        }
    }
}

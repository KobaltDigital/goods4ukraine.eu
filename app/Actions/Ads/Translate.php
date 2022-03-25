<?php

namespace App\Actions\Ads;

use Google\Cloud\Translate\V3\TranslationServiceClient;

class Translate
{
    private $translationClient;

    public function __construct()
    {
        $this->translationClient = new TranslationServiceClient([
            'credentials' => json_decode(config('goods4ukraine.google.service_account'), true),
        ]);
    }

    public function execute(string $string)
    {
        $languages = [
            'en' => 'en',
            'nl' => 'nl',
            'ua' => 'uk',
            'ru' => 'ru',
        ];

        $translations = [];
        foreach ($languages as $key => $language) {
            $response = $this->translationClient->translateText(
                [$string],
                $language,
                TranslationServiceClient::locationName(config('goods4ukraine.google.project'), 'global')
            );

            $translations[$key] = $response->getTranslations()[0]->getTranslatedText();
        }
        return $translations;
    }
}

<?php

namespace App\Actions\Ads;

use Google\Cloud\Translate\V3\TranslationServiceClient;

class Translate
{
    public function execute(string $string)
    {
        $translationClient = new TranslationServiceClient([
            'credentials' => json_decode(config('goods4ukraine.google.service_account'), true)
        ]);

        $languages = [
            'en' => 'en',
            'nl' => 'nl',
            'ua' => 'uk'
        ];

        $translations = [];
        foreach ($languages as $key => $language) {
            $response = $translationClient->translateText(
                [$string],
                $language,
                TranslationServiceClient::locationName(config('goods4ukraine.google.project'), 'global')
            );

            $translations[$key] = $response->getTranslations()[0]->getTranslatedText();
        }
        return $translations;
    }
}

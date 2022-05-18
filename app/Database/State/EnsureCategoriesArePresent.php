<?php

namespace App\Database\State;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class EnsureCategoriesArePresent
{
    private $categories = [
        [
            'name' => [
                'en' => 'Clothing',
                'nl' => 'Kleding',
                'ua' => 'одяг',
                'ru' => 'одежда',
                'fr' => 'Vêtements',
            ],
        ],
        [
            'name' => [
                'en' => 'Toys',
                'nl' => 'Speelgoed',
                'ua' => 'іграшки',
                'ru' => 'игрушки',
                'fr' => 'Jouets',
            ],
        ],
        [
            'name' => [
                'en' => 'Bicycles',
                'nl' => 'Fietsen',
                'ua' => 'велосипеди',
                'ru' => 'велосипеды',
                'fr' => 'Vélos',
            ],
        ],
        [
            'name' => [
                'en' => 'to Sleep',
                'nl' => 'Slapen',
                'ua' => 'спальний',
                'ru' => 'спальный',
                'fr' => 'Dormir',
            ],
        ],
        [
            'name' => [
                'en' => 'Furniture',
                'nl' => 'Meubels',
                'ua' => 'меблі',
                'ru' => 'мебель',
                'fr' => 'Meubles',
            ],
        ],
        [
            'name' => [
                'en' => 'Cook',
                'nl' => 'Koken',
                'ua' => 'приготування їжі',
                'ru' => 'приготовление еды',
                'fr' => 'Cuisine',
            ],
        ],
        [
            'name' => [
                'en' => 'Baby items',
                'nl' => 'Baby artikelen',
                'ua' => 'дитячі речі',
                'ru' => 'детские предметы',
                'fr' => 'Articles pour bébés',
            ],
        ],
        [
            'name' => [
                'en' => 'Electronics',
                'nl' => 'Elektronica',
                'ua' => 'Електроніка',
                'ru' => 'Электроника',
                'fr' => 'Électronique',
            ],
        ],
        [
            'name' => [
                'en' => 'Other',
                'nl' => 'Overig',
                'ua' => 'інший',
                'ru' => 'Другой',
                'fr' => 'Autres',
            ],
        ]
    ];

    public function __invoke()
    {
        if (!Schema::hasTable('categories')) {
            return 0;
        }

        foreach ($this->categories as $category) {

            // Get the category from the DB
            $dbCategory = Category::where('name->en', $category['name']['en'])->first();

            // Check if the category exists
            if ($dbCategory) {

                // Loop through all languages
                foreach ($category['name'] as $language => $translation) {

                    // Check if the language exists
                    if (!$dbCategory->getTranslation('name', $language, false)) {

                        // Create the language in the DB
                        $dbCategory->setTranslation('name', $language, $translation);
                        $dbCategory->save();
                    }
                }
            } else {
                Category::create($category);
            }
        }
    }

    private function isPresent($language, $category)
    {
        return Category::where('name->' . $language, $category)->exists();
    }
}

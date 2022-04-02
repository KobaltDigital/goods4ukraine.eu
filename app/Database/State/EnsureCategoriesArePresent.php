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
            ],
        ],
        [
            'name' => [
                'en' => 'Bicycles',
                'nl' => 'Fietsen',
                'ua' => 'велосипеди',
                'ru' => 'велосипеды',
            ],
        ],
        [
            'name' => [
                'en' => 'to Sleep',
                'nl' => 'Slapen',
                'ua' => 'спальний',
                'ru' => 'спальный',
            ],
        ],
        [
            'name' => [
                'en' => 'Furniture',
                'nl' => 'Meubels',
                'ua' => 'меблі',
                'ru' => 'мебель',
            ],
        ],
        [
            'name' => [
                'en' => 'Koken',
                'nl' => 'Sleeping',
                'ua' => 'приготування їжі',
                'ru' => 'приготовление еды',
            ],
        ],
        [
            'name' => [
                'en' => 'Toys',
                'nl' => 'Speelgoed',
                'ua' => 'іграшки',
                'ru' => 'игрушки',
            ],
        ],
        [
            'name' => [
                'en' => 'Other',
                'nl' => 'Overig',
                'ua' => 'інший',
                'ru' => 'Другой',
            ],
        ],
    ];

    public function __invoke()
    {
        if (!Schema::hasTable('categories')) {
            return 0;
        }

        foreach ($this->categories as $category) {
            if ($this->isPresent($category['name']['en'])) {
                continue;
            }

            Category::create($category);
        }
    }

    private function isPresent($category)
    {
        return Category::where('name->en', $category)->exists();
    }
}

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
                'en' => 'Toys',
                'nl' => 'Speelgoed',
                'ua' => 'іграшки',
                'ru' => 'игрушки',
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

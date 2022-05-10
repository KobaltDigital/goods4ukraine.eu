<?php

namespace App\Database\State;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class EnsureFrenchCategoriesArePresent
{
    private $categories = [
        [
            'Clothing' => 'Vêtements',
            'Toys' => 'Jouets',
            'Bicycles' => 'Vélos',
            'to Sleep' => 'Dormir',
            'Furniture' => 'Meubles',
            'Cook' => 'Cuisine',
            'Baby items' => 'Articles pour bébés',
            'Electronics' => 'Électronique',
        ],
    ];

    public function __invoke()
    {
        if (!Schema::hasTable('categories')) {
            return 0;
        }

        $categories = Category::all();

        foreach ($categories as $category) {
            if (Arr::exists($this->categories, $category->getTranslation('name', 'en'))) {
                echo 'ok';
                // $language->select_language_title = $this->selectLanguages[$language->locale];
                // $language->save();
            }
        }
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->word();
        $types = ['offered', 'wanted'];

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'telephone' => $this->faker->phoneNumber,
            'show_telephone' => rand(0, 1),
            'email' => $this->faker->email,
            'show_email' => rand(0, 1),
            'type' => $types[array_rand($types)],
            'street' => 'Koelmalaan',
            'house_number' => 350,
            'house_number_suffix' => null,
            'postcode' => '1812PS',
            'city' => 'Alkmaar',
            'country' => 'The Netherlands',
            'location' => new Point(52.61779, 4.7669)
        ];
    }
}

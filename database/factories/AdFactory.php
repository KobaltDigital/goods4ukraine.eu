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
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'type' => $types[array_rand($types)],
            'street' => 'Koelmalaan 350',
            'postcode' => '1812PS',
            'city' => 'Alkmaar',
            'country' => 'The Netherlands',
            'location' => new Point(52.61779, 4.7669),
            'show_phone' => rand(0, 1),
            'show_email' => rand(0, 1),
            'show_full_address' => rand(0, 1),
        ];
    }
}

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
        $title = $this->faker->jobTitle();
        $types = ['Offered', 'Wanted'];

        return [
            'title' => $title,
            'description' => $this->faker->realText(),
            'type' => $types[array_rand($types)],
            'street' => $this->faker->streetName(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => "nl",
            'location' => new Point($this->faker->latitude(40, 60), $this->faker->latitude(3, 6)),
        ];
    }
}

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
        $types = ['offered', 'wanted'];

        return [
            'title' => $title,
            'description' => $this->faker->realText(),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'type' => $types[array_rand($types)],
            'street' => $this->faker->streetName(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'location' => new Point($this->faker->latitude(40, 60) , $this->faker->latitude(3, 6)),
            'show_phone' => rand(0, 1),
            'show_email' => rand(0, 1),
            'show_full_address' => rand(0, 1),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class AdSeeder extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 1000; $i++) { 
            $user = User::inRandomOrder()->first();
            Ad::factory()
                ->create([
                    'user_id' => $user->id,
                ]);
        }
    }
}

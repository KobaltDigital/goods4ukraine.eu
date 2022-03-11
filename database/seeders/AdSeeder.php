<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $users->each(function ($user) {
            Ad::factory()
                ->count(30)
                ->create([
                    'author_id' => $user->id
                ]);
        });
    }
}

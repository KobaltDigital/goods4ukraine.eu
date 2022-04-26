<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 1000 fake users
        User::factory(1000)->create();

        // Create admin user
        $user = new User();
        $user->name = 'Kobalt';
        $user->email = 'hello@kobaltdigital.nl';
        $user->admin = True;
        $user->password = Hash::make('password');
        $user->save();
    }
}

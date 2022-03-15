<?php

namespace App\Actions\Users;

use App\Models\User;

class CreateUser
{
    public function execute(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

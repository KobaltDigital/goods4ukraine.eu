<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class CreateUser
{
    public function execute(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'lang' => Session::get('language'),
            'password' => bcrypt($data['password']),
        ]);
    }
}

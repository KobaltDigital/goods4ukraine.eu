<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Enums\AdTypeEnum;
use Illuminate\Http\Request;
use App\Actions\Ads\CreateAd;
use Illuminate\Validation\Rules;
use App\Actions\Users\CreateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $adTypes = AdTypeEnum::toArray();
        return view('auth.register', compact('adTypes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(
        RegisterUserRequest $request,
        CreateUser $createUser,
        CreateAd $createAd
    ) {
        $user = $createUser->execute($request->validated());

        $createAd->execute($request->validated(), $user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

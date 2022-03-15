<?php

namespace App\Http\Requests\Auth;

use App\Enums\AdTypeEnum;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => new EnumRule(AdTypeEnum::class),
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'image' => ['image'],

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => ['string', 'max:255'],
            'country' => [
                'string',
                'max:255',
                'in:' . implode(",", array_keys(config('goods4ukraine.countries'))),
            ],
            'street' => ['string', 'max:255'],
            'postcode' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'show_phone' => ['nullable'],
            'show_email' => ['nullable'],
            'show_full_address' => ['nullable'],
        ];
    }
}

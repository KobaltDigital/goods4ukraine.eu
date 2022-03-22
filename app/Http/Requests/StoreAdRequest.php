<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
{
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
            'title' => ['required', 'string', 'max:250'],
            'description' => ['required', 'max:10000'],
            'type' => ['required', 'in:Offered,Wanted'],
            'street' => ['required', 'max:50'],
            'postcode' => ['required', 'max:10'],
            'city' => ['required', 'max:50'],
            'country' => ['required','max:50'],
        ];
    }
}

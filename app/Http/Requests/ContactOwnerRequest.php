<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactOwnerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name') . ' ' . __('is required'),
            'email.required' => __('Email') . ' ' . __('is required'),
            'email.email' => __('Email') . ' ' . __('is invalid'),
            'message.required' => __('Message') . ' ' . __('is required'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:3',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required'     => 'Imie jest wymagane',
            'name.max'          => 'Maksymalna ilosc znakow :max',
            'email.required'    => 'Mail jest wymagany',
            'email.unique'      => 'Mail musi być unikalny',
            'password.required' => 'CHASŁO jest wymagane',
            'password.confirmed'=> 'CHASŁA nie są zgodne.'
        ];
    }
}

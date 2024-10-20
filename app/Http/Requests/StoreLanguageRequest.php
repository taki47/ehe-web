<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can("language_create");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "required",
                "unique:languages,name"
            ],
            "lang_code" => [
                "required",
                "unique:languages,lang_code"
            ],
            "flag" => [
                "required",
                'image',
                'mimes:jpg,jpeg,png,gif',
                'max:2048'
            ]
        ];
    }
}

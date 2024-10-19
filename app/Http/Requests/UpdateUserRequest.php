<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can("user_edit");
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
				Rule::unique("users")->ignore($this->route('user')),
			],
            "password" => [
                "nullable",
                "confirmed"
            ],
            "role" => [
                "required",
                "array"
            ],
            "role.*" => [
                "exists:roles,name"
            ]
        ];
    }
}

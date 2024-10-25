<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can("banner_edit");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => [
                "required",
                Rule::unique("banners")->ignore($this->route('banner')),
            ],
            "description" => [
                "required"
            ],
            "media" => [
                "required",
                "exists:media,id"
            ],
            "language" => [
                "required",
                "exists:languages,id"
            ]
        ];
    }
}

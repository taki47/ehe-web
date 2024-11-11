<?php

namespace App\Http\Requests;

use App\Models\PartnerType;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $type = $this->route("type");

        return Auth::user()->can($type."_create");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $type = $this->route("type");
        $partnerType = PartnerType::where("name", $type)->first();

        return [
            "name" => [
				"required",
				Rule::unique("partners", "name")->where(function($query) use ($partnerType) {
                    $query->where("partner_type_id", $partnerType->id);
                }),
			],
            "link" => [
                "required",
                "url"
            ],
            "image" => [
                "required",
                'mimes:jpg,jpeg,png,gif',
                'max:2048'
            ]
        ];
    }
}

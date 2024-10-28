<?php

namespace App\Http\Requests;

use App\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Helper::userCanAccess('menu_create_') || Auth::user()->can("any_menu_create");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = [
            'name' => 'required|string|max:255|unique:menus,name',
            'parent_id' => 'nullable|exists:menus,id'
        ];

        if ( $this->parent_id=="" ) {
            $rule['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            $rule['description'] = 'string|max:500';
        }

        return $rule;
    }
}

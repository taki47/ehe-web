<?php

namespace App\Http\Requests;

use App\Helper;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('menus', 'name')->where(function ($query) {
                    /**
                     * ha főmenüt vesz fel (parent_id==null), akkor lehet ugyanolyan nevű menüpont más nyelven
                     * ha nem főmenüt vesz fel (parent_id!=null), akkor az adott főmenün belül nem lehet ugyanaz a név
                     */
                    if ( !$this->parent_id ) {
                        $query->where('language_id', $this->language_id);
                    } else {
                        $query->where('parent_id', $this->parent_id);
                    }
                }),
            ],
            'parent_id' => 'nullable|exists:menus,id'
        ];

        if ( $this->parent_id=="" ) {
            $rule['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
            $rule['description'] = 'required|string|max:500';
            $rule['language_id'] = 'required|exists:languages,id';
        }

        return $rule;
    }
}

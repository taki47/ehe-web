<?php

namespace App\Http\Requests;

use App\Models\Menu;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $id = $this->route('menu');
        $menu = Menu::findOrFail($id);
        $topLevelParentId = $menu->getTopLevelParentId();

        return Auth::user()->can('menu_edit_'.$topLevelParentId) && Auth::user()->can("any_menu_edit");
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
                Rule::unique("menus")->ignore($this->route('menu')),
            ],
            'parent_id' => 'nullable|exists:menus,id'
        ];

        if ( $this->parent_id=="" ) {
            $rule['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            $rule['description'] = 'string|max:500';
            $rule['language_id'] = 'required|exists:languages,id';
        }

        return $rule;
    }
}

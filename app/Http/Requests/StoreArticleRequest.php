<?php

namespace App\Http\Requests;

use App\Models\ArticleType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $type = $this->route("type");
        $articleType = ArticleType::where("slug", $type)->first();
        $rule = "";

        if ( $this->savetype=="draft" ) {
            $rule = [
                "title" => [
                    "required",
                    Rule::unique('articles', 'title')->where(function ($query) use ($articleType) {
                        $query->where("menu_id", $this->menu_id)->where("article_type_id", $articleType->id);
                    })
                ],
                "cover" => [
                    "nullable",
                    'image',
                    'mimes:jpg,jpeg,png,gif',
                    'max:2048'
                ],
                "lead" => [
                    "nullable"
                ],
                "body" => [
                    "nullable"
                ],
                "language" => [
                    "required",
                    "exists:languages,id"
                ],
                "menu_id" => [
                    "required",
                    "exists:menus,id"
                ]
            ];
        } else {
            $rule = [
                "title" => [
                    "required",
                    Rule::unique('articles', 'title')->where(function ($query) use ($articleType) {
                        $query->where("menu_id", $this->menu_id)->where("article_type_id", $articleType->id);
                    })
                ],
                "cover" => [
                    "required",
                    'image',
                    'mimes:jpg,jpeg,png,gif',
                    'max:2048'
                ],
                "lead" => [
                    "required"
                ],
                "body" => [
                    "required"
                ],
                "language" => [
                    "required",
                    "exists:languages,id"
                ],
                "menu_id" => [
                    "required",
                    "exists:menus,id"
                ]
            ];
        }

        return $rule;
    }
}

<?php

namespace App\Http\Requests\CategoryQuestion;

use Illuminate\Foundation\Http\FormRequest;

class CategoryQuestionRequest extends FormRequest
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
            'category' => 'required|unique:category_questions'
        ];
    }
}

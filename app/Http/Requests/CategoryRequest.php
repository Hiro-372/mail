<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category.name' => 'required|string|max:100',
            'category.explanatory' => 'required|string|max:3000',
            'category.users_id' => 'required|string|max:100',        
        ];
    }
}

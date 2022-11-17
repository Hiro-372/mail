<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaildataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'maildata.title' => 'required|string|max:100',
            'maildata.message' => 'required|string|max:5000',
            'maildata.link' => 'required|string|max:300',
            'maildata.categories_id' => 'required|string|max:20',
            'maildata.users_id' => 'required|string|max:100',
        ];
    }
}
?>
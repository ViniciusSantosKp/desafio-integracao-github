<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchUserGitHubFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255|min:3',
            'order' => 'nullable|in:stars,name,language',
        ];
    }

    public function getData()
    {
        return [
            'name' => $this->input('name'),
            'order' => $this->input('order'),
        ];
    }
}

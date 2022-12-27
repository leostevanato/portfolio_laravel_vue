<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|max:20',
            'title' => 'required|string|max:60',
            'language' => 'required|string|max:2',
            'description' => 'nullable',
            'visible' => 'boolean::0,1,true,false'
        ];
    }
}

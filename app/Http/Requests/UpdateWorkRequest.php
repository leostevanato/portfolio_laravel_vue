<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
            'portfolio_id' => 'required|integer|max:20',
            'title' => 'required|string|max:60',
            'slug' => 'required|unique:works,slug,'. $this->work->id .'|max:60',
            'description' => 'nullable',
            'url' => 'nullable|max:200',
            'image' => 'nullable|max:50',
            'visible' => 'boolean::0,1,true,false'
        ];
    }
}

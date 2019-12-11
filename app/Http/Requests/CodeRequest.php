<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|numeric|exists:categories,id',
            'diagnosis_code' => 'required|string|max:20',
            'full_code' => 'required|string|max:20', Rule::unique('codes')->ignore($this->id),
            'abbreviated_description' => 'string',
            'full_description' => 'string',
        ];
    }
}

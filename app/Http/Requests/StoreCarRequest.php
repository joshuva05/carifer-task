<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:250',
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|numeric',
            'year' => 'required|string'

        ];
    }

    public function messages()
    {
        return [
            'year.numeric' => 'Must be year'
        ];
    }
}

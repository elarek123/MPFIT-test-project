<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'category_id' => 'sometimes|int|exists:categories,id',
            'description' => 'sometimes|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'string' => 'Поле :attribute должно быть строкой',
            'numeric' => 'Поле :attribute должно быть числом',
            'int' => 'Поле :attribute должно быть числом',
            'category_id.exists' => 'Указана неверная категория'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptRequest extends FormRequest
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
            'second_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'comment' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
            'product_id' => 'sometimes|integer|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            'string' => 'Поле :attribute должно быть строкой',
            'numeric' => 'Поле :attribute должно быть числом',
            'integer' => 'Поле :attribute должно быть числом',
            'product_id.exists' => 'Указан неверный продукт'
        ];
    }
}

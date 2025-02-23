<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceiptRequest extends FormRequest
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
            'name' => 'required|string',
            'second_name' => 'required|string',
            'last_name' => 'required|string',
            'comment' => 'sometimes|string',
            'amount' => 'required|numeric',
            'product_id' => 'required|integer|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'string' => 'Поле :attribute должно быть строкой',
            'numeric' => 'Поле :attribute должно быть числом',
            'integer' => 'Поле :attribute должно быть числом',
            'product_id.exists' => 'Указан неверный продукт'
        ];
    }
}

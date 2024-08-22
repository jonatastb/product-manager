<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdicaoProdutoRequest extends FormRequest
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
            'name' => 'required|string|max:225',
            'price' => 'required|decimal:2|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}

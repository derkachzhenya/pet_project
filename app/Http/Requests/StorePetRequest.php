<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'price' => 'required|numeric|min:0|decimal:0,2',
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'Ви не ввели дані',
        'title.string' => 'Поле має бути рядком',
        'price.required' => 'Ви не ввели дані',
        'price.numeric' => 'Поле ціни має бути числом',
    ];
}
}

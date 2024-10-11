<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwoPetRequest extends FormRequest
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
            'categoryvariety_id' => 'required',
            'age' => 'required|string|max:3',
            'categoryage_id' => 'required',
            'gender' => 'required',

            'sterilization' => 'nullable|boolean',
            'vaccination' => 'nullable|boolean',
            'chip' => 'nullable|boolean',
            'processing' => 'nullable|boolean',
            'vet_pasport' => 'nullable|boolean',
            'pedigree' => 'nullable|boolean',
            'fci' => 'nullable|boolean',
            'metrics' => 'nullable|boolean',
        ];
    }


    public function messages(): array
    {
        return [
            'categoryvariety_id.required' => 'Ви не вибрали породу',
            'age.required' => 'Ви не ввели вік',
            'categoryage_id.required' => 'Виберіть період',
            'gender.required' => 'Виберіть стать',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPetStepThreeRequest extends FormRequest
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
            'categorycolor_id' => 'required',
            'description' => 'required',
            'main_image' => 'required|file|mimes:jpeg,png,jpg|max:10240',
            'image_one' => 'file|mimes:jpeg,png,jpg|max:10240',
           
        ];
    }

    public function messages(): array
    {
        return [
            'categorycolor_id.required' => 'Оберіть забарвлення',
            'description.required' => 'Ви не ввели дані',
            'description.string' => 'Поле має бути рядком',
        ];
    }
}

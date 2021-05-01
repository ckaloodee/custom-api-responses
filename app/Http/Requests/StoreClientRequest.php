<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'validation.required.name',
            'name.string' => 'validation.string.name',
            'name.min' => 'validation.min.name',
            'name.max' => 'validation.max.name',
            'surname.required' => 'validation.required.surname',
            'surname.string' => 'validation.string.surname',
            'surname.min' => 'validation.min.surname',
            'surname.max' => 'validation.max.surname',
        ];
    }
}

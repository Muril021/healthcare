<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
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
        $specialtyId = $this->route('id');

        $rules = [
            'name' => 'required|regex:/^[\pL\s]+$/u|unique:specialties,name,'.$specialtyId,
            'description' => 'required|string|min:20|unique:specialties,description,'.$specialtyId
        ];

        if (!$specialtyId) {
            $rules = [
                'name' => 'required|regex:/^[\pL\s]+$/u|unique:specialties,name',
                'description' => 'required|string|min:20|unique:specialties,description'
            ];
        }

        return $rules;
    }
}

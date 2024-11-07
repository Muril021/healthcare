<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        $doctorId = $this->route('id');

        $rules = [
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:255',
            'crm_number' => 'required|digits:6|not_in:000000|unique:doctors,crm_number,'.$doctorId,
            'specialty_id' => 'required',
        ];

        if (!$doctorId) {
            $rules['crm_number'] = 'required|digits:6|not_in:000000|unique:doctors,crm_number';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.regex' => 'O campo nome deve conter apenas letras e espaços.',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',

            'crm_number.required' => 'O campo CRM é obrigatório.',
            'crm_number.digits' => 'O campo CRM deve ter exatamente 6 dígitos.',
            'crm_number.not_in' => 'O CRM não pode conter uma sequência de zeros.',
            'crm_number.unique' => 'O CRM informado já está em uso.',

            'specialty_id.required' => 'Selecione uma especialidade.',
        ];
    }
}

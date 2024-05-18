<?php

namespace App\Http\Requests\DemandeActivation;

use Illuminate\Foundation\Http\FormRequest;

class CreateDemandeActivationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'etat' => ['required', 'in:cours,rejetee,valid'],          
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Le champ user_id est obligatoire',
            'etat.required' => 'Le champ etat est obligatoire',
            'etat.in' => 'Le champ etat doit être l\'une des valeurs suivantes: cours, rejetee, valid',
        ];      

    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'message' => 'Validation error',
            'errors' => $validator->errors()
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}

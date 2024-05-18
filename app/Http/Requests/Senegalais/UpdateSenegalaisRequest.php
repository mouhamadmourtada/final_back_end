<?php

namespace App\Http\Requests\Senegalais;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSenegalaisRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['sometimes', 'string'],
			'prenom' => ['sometimes', 'string'],
			'adresse' => ['sometimes', 'string'],
			'date_naissance' => ['sometimes', 'date'],
			'lieu_naissance' => ['sometimes', 'string'],
			'cin' => ['sometimes', 'string'],
			'telephone' => ['sometimes', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.string' => 'Le champ nom doit être une chaîne de caractères',
            'prenom.string' => 'Le champ prenom doit être une chaîne de caractères',
            'adresse.string' => 'Le champ adresse doit être une chaîne de caractères',
            'date_naissance.date' => 'Le champ date_naissance doit être une date',
            'lieu_naissance.string' => 'Le champ lieu_naissance doit être une chaîne de caractères',
            'cin.string' => 'Le champ cin doit être une chaîne de caractères',
            'telephone.string' => 'Le champ telephone doit être une chaîne de caractères',
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

<?php

namespace App\Http\Requests\Senegalais;

use Illuminate\Foundation\Http\FormRequest;

class CreateSenegalaisRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string'],
			'prenom' => ['required', 'string'],
			'adresse' => ['required', 'string'],
			'date_naissance' => ['required', 'date'],
			'lieu_naissance' => ['required', 'string'],
			'cin' => ['required', 'string'],
			'telephone' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères',
            'prenom.required' => 'Le champ prenom est obligatoire',
            'prenom.string' => 'Le champ prenom doit être une chaîne de caractères',
            'adresse.required' => 'Le champ adresse est obligatoire',
            'adresse.string' => 'Le champ adresse doit être une chaîne de caractères',
            'date_naissance.required' => 'Le champ date_naissance est obligatoire',
            'date_naissance.date' => 'Le champ date_naissance doit être une date',
            'lieu_naissance.required' => 'Le champ lieu_naissance est obligatoire',
            'lieu_naissance.string' => 'Le champ lieu_naissance doit être une chaîne de caractères',
            'cin.required' => 'Le champ cin est obligatoire',
            'cin.string' => 'Le champ cin doit être une chaîne de caractères',
            'telephone.required' => 'Le champ telephone est obligatoire',
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

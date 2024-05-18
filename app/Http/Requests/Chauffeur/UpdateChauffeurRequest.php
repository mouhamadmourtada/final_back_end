<?php

namespace App\Http\Requests\Chauffeur;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChauffeurRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes'],
			'nom' => ['sometimes', 'string'],
			'prenom' => ['sometimes', 'string'],
			'email' => ['sometimes', 'email', 'string'],
			'telephone' => ['sometimes', 'string'],
			'adresse' => ['sometimes', 'string'],
			'date_naissance' => ['sometimes', 'date'],
			'lieu_naissance' => ['sometimes', 'string'],
			'password' => ['sometimes', 'string'],
			'matricule' => ['sometimes', 'string'],
			'cin' => ['sometimes', 'string'],
			'senegalais_id' => ['sometimes'],
			'marque' => ['sometimes', 'string'],
			'annee_voiture' => ['sometimes', 'string'],
        ];
    }

	public function messages (): array
	{
		return [
			'nom.string' => 'Le champ nom doit être une chaine de caractères',
			'prenom.string' => 'Le champ prenom doit être une chaine de caractères',
			'email.email' => 'Le champ email doit être une adresse email valide',
			'password.string' => 'Le champ password doit être une chaine de caractères',
			'date_naissance.date' => 'Le champ date_naissance doit être une date valide',
			'telephone.string' => 'Le champ telephone doit être une chaine de caractères',
			'adresse.string' => 'Le champ adresse doit être une chaine de caractères',
			'lieu_naissance.string' => 'Le champ lieu_naissance doit être une chaine de caractères',
			'matricule.string' => 'Le champ matricule doit être une chaine de caractères',
			'cin.string' => 'Le champ cin doit être une chaine de caractères',
			'marque.string' => 'Le champ marque doit être une chaine de caractères',
			'annee_voiture.string' => 'Le champ annee_voiture doit être une chaine de caractères',
		];
	}

	public function failedValidation (\Illuminate\Contracts\Validation\Validator $validator)
	{
		$response = response()->json([
			'message' => 'Validation error',
			'errors' => $validator->errors()
		], 422);

		throw new \Illuminate\Validation\ValidationException($validator, $response);
	}
}

<?php

namespace App\Http\Requests\Chauffeur;

use Illuminate\Foundation\Http\FormRequest;

class CreateChauffeurRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // 'id' => ['required'],
			'nom' => ['required', 'string'],
			'prenom' => ['required', 'string'],
			'email' => ['required', 'email', 'string'],
			'telephone' => ['nullable', 'string'],
			'adresse' => ['nullable', 'string'],
			'date_naissance' => ['nullable', 'date'],
			'lieu_naissance' => ['nullable', 'string'],
			'password' => ['required', 'string'],
			'matricule' => ['nullable', 'string'],
			'cin' => ['nullable', 'string'],
			// 'senegalais_id' => ['nullable'],
			'marque' => ['nullable', 'string'],
			'annee_voiture' => ['nullable', 'string'],
        ];
    }

	public function messages (): array
	{
		return [
			'nom.required' => 'Le champ nom est obligatoire',
			'prenom.required' => 'Le champ prenom est obligatoire',
			'email.required' => 'Le champ email est obligatoire',
			'email.email' => 'Le champ email doit être une adresse email valide',
			'password.required' => 'Le champ password est obligatoire',
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

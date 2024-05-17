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
}

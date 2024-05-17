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
}

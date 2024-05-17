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
}

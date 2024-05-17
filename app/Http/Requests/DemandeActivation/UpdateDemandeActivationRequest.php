<?php

namespace App\Http\Requests\DemandeActivation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDemandeActivationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'etat' => ['sometimes', 'in:cours,rejetee,valid'],
        ];
    }
}

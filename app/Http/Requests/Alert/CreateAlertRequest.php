<?php

namespace App\Http\Requests\Alert;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlertRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'course_id' => ['required'],
			'description' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Le champ user_id est obligatoire',
            'course_id.required' => 'Le champ course_id est obligatoire',
            'description.required' => 'Le champ description est obligatoire',
            'description.string' => 'Le champ description doit être une chaîne de caractères',
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

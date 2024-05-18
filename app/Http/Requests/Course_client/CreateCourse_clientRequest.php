<?php

namespace App\Http\Requests\Course_client;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourse_clientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'course_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Le champ user_id est obligatoire',
            'course_id.required' => 'Le champ course_id est obligatoire',
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

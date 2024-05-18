<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'date' => ['sometimes', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Le champ user_id est obligatoire',
            'date.required' => 'Le champ date est obligatoire',
            'date.date' => 'Le champ date doit être une date',
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

<?php

namespace App\Http\Requests\Course_client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourse_clientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'course_id' => ['sometimes'],
        ];
    }
}

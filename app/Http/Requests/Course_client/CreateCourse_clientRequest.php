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
}

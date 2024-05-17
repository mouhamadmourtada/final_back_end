<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'date' => ['required', 'date'],
        ];
    }
}

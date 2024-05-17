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
}

<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes'],
			'course_id' => ['sometimes'],
			'note' => ['sometimes', 'string'],
        ];
    }
}

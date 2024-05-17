<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'course_id' => ['required'],
			'note' => ['required', 'string'],
        ];
    }
}

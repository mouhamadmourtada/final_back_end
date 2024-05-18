<?php

namespace App\Http\Resources\Alert;

use Illuminate\Http\Resources\Json\JsonResource;

class AlertResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
			'course_id' => $this->course_id,
			'description' => $this->description,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}

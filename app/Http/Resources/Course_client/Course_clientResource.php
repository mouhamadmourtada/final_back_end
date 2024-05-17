<?php

namespace App\Http\Resources\Course_client;

use Illuminate\Http\Resources\Json\JsonResource;

class Course_clientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
			'course_id' => $this->course_id,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}

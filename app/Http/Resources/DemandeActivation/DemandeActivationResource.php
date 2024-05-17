<?php

namespace App\Http\Resources\DemandeActivation;

use Illuminate\Http\Resources\Json\JsonResource;

class DemandeActivationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
			'etat' => $this->etat,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}

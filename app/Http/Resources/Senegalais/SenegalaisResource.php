<?php

namespace App\Http\Resources\Senegalais;

use Illuminate\Http\Resources\Json\JsonResource;

class SenegalaisResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
			'prenom' => $this->prenom,
			'adresse' => $this->adresse,
			'date_naissance' => dateTimeFormat($this->date_naissance),
			'lieu_naissance' => $this->lieu_naissance,
			'cin' => $this->cin,
			'telephone' => $this->telephone,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}

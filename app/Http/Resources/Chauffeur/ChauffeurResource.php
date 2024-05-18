<?php

namespace App\Http\Resources\Chauffeur;

use Illuminate\Http\Resources\Json\JsonResource;

class ChauffeurResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'id' => $this->id,
			'nom' => $this->nom,
			'prenom' => $this->prenom,
			'email' => $this->email,
			'telephone' => $this->telephone,
			'adresse' => $this->adresse,
			'date_naissance' => dateTimeFormat($this->date_naissance),
			'lieu_naissance' => $this->lieu_naissance,
			'password' => $this->password,
			'matricule' => $this->matricule,
			'cin' => $this->cin,
			'senegalais_id' => $this->senegalais_id,
			'marque' => $this->marque,
			'annee_voiture' => $this->annee_voiture,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}

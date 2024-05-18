<?php

namespace App\Models;

use App\Filters\ChauffeurFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chauffeur extends Model
{
    use HasFactory, Filterable;

	protected $table = 'users';

    protected string $default_filters = ChauffeurFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'id',
		'nom',
		'prenom',
		'email',
		'telephone',
		'adresse',
		'date_naissance',
		'lieu_naissance',
		'password',
		'matricule',
		'cin',
		'senegalais_id',
		'marque',
		'annee_voiture',
    ];


	// un chauffeur peut avoir des documents et il s'agit d'une relation morph
	public function documents(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(\App\Models\Fichier::class, 'fichierable');
	}

	public function senegalais(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Senegalais::class);
	}

}

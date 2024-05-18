<?php

namespace App\Models;

use App\Filters\DemandeActivationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeActivation extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = DemandeActivationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'etat', 
    ];

    protected $table = 'demandeActivations';

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class);
	}

}

<?php

namespace App\Models;

use App\Filters\SenegalaisFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Senegalais extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = SenegalaisFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
		'prenom',
		'adresse',
		'date_naissance',
		'lieu_naissance',
		'cin',
		'telephone',
    ];


}

<?php

namespace App\Models;

use App\Filters\Course_clientFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_client extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Course_clientFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'course_id',
    ];

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Course::class);
	}

}

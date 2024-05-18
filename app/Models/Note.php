<?php

namespace App\Models;

use App\Filters\NoteFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = NoteFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'course_id',
		'note',
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

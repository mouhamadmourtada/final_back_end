<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'extension',
        'url',
        'fichierable_id',
        'fichierable_type',
    ];

    public function fichierable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = str_replace(asset('storage/'), '', $value);
    }

    
}

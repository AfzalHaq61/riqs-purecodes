<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    
    public function scopeExclude($query, array $statuses)
    {
        return $query->whereNotIn('slug', $statuses);
    }
}

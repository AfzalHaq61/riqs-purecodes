<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'name',
        'slug',
    ];

    public function user() 
    {
        return $this->hasOne(Region::class);
    }
}

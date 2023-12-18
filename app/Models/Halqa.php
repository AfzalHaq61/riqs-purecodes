<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halqa extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'shehar_id',
        'name',
        'slug',
    ];
}

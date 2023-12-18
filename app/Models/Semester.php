<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'center_id',
        'semester_number',
        'semester_shuraka',
        'muhazir_id',
        'mawin_muhazir_id',
        'start_date',
        'end_date',
        'region_id',
        'zone_id',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function muhazir()
    {
        return $this->belongsTo(Resource::class);
    }

    public function mawin_muhazir()
    {
        return $this->belongsTo(Resource::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'resource_semesters');
    }
}

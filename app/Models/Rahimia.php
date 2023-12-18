<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rahimia extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'resource_id',
        'date',
        'received_amount',
        'received_by',
        'receipt_no',
    ];

    // Relations

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }
}

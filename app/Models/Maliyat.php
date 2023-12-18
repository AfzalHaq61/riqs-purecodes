<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maliyat extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'resource_id',
        'date',
        'fixed_amount',
        'received_amount',
        'recieved_by',
        'receipt_no',
        'arrears',
    ];

    // Relations

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }
}

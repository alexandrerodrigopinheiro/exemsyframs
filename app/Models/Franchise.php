<?php

namespace App\Models;

use App\Models\CommercialRepresentative;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Franchise extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $softDelete = true;

    protected $fillable = [
        'code',
        'name',
        'identity',
        'address',
        'phone',
        'email',
        'observation',
        'service_terms',
        'enabled',
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'identity' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'observation' => 'string',
        'service_terms' => 'boolean',
        'enabled' => 'boolean',
    ];

    /**
     * Relationships
     */
    public function commercialRepresentative(): BelongsTo
    {
        return $this->belongsTo(CommercialRepresentative::class)->withTrashed();
    }
}

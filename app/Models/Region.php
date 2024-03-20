<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $softDelete = true;

    protected $fillable = [
        'franchise_id',
        'business_operation_id',
        'operations_manager_id',
        'name',
        'observation',
        'enabled',
    ];

    protected $casts = [
        'franchise_id' => 'string',
        'business_operation_id' => 'string',
        'operations_manager_id' => 'string',
        'name' => 'string',
        'observation' => 'string',
        'enabled' => 'boolean',
    ];

    /**
     * Relationships
     */
    public function franchise(): BelongsTo
    {
        return $this->belongsTo(Franchise::class)->withTrashed();
    }

    public function businessOperation(): BelongsTo
    {
        return $this->belongsTo(BusinessOperation::class)->withTrashed();
    }

    public function operationsManager(): BelongsTo
    {
        return $this->belongsTo(OperationsManager::class)->withTrashed();
    }
}

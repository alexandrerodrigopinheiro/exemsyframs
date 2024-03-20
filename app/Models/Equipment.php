<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $softDelete = true;

    protected $fillable = [
        'franchise_id',
        'business_operation_id',
        'operations_manager_id',
        'name',
        'identity',
        'address',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'access_level',
        'observation',
        'enabled',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'franchise_id' => 'string',
        'business_operation_id' => 'string',
        'operations_manager_id' => 'string',
        'name' => 'string',
        'identity' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'access_level' => 'array',
        'observation' => 'string',
        'enabled' => 'boolean',
        'remember_token' => 'string',
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

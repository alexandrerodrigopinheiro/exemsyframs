<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationsManager extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $softDelete = true;

    public $table = 'operations_managers';

    protected $fillable = [
        'franchise_id',
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommercialRepresentative extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $softDelete = true;

    protected $fillable = [
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
    public function franchises(): BelongsToMany
    {
        return $this->belongsToMany(Franchise::class)->withTrashed();
    }
}

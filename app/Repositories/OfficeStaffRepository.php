<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OfficeStaffRepository extends AbstractRepository
{
    protected static $model = User::class;

    public static function getEmailSingle(string $email): ?Model
    {
        $model = self::load()::query()
            ->where('email', 'LIKE', $email)
            ->first();

        if (! $model) {
            return null;
        }

        return $model;
    }

    public static function getRememberTokenSingle(string $remember_token): ?Model
    {
        $model = self::load()::query()
            ->where('remember_token', 'LIKE', $remember_token)
            ->first();

        if (! $model) {
            return null;
        }

        return $model;
    }
}

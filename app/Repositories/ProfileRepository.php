<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\AbstractRepository;

class ProfileRepository extends AbstractRepository
{
    protected static $model = Profile::class;
}

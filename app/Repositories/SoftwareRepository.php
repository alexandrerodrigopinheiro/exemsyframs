<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Software;
use App\Repositories\AbstractRepository;

class SoftwareRepository extends AbstractRepository
{
    protected static $model = Software::class;
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Region;
use App\Repositories\AbstractRepository;

class RegionRepository extends AbstractRepository
{
    protected static $model = Region::class;
}

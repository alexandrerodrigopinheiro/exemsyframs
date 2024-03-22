<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Point;
use App\Repositories\AbstractRepository;

class PointRepository extends AbstractRepository
{
    protected static $model = Point::class;
}

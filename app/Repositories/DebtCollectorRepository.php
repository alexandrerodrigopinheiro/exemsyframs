<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Debt_collector;
use App\Repositories\AbstractRepository;

class Debt_collectorRepository extends AbstractRepository
{
    protected static $model = Debt_collector::class;
}

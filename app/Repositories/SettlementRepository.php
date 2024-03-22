<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Settlement;
use App\Repositories\AbstractRepository;

class SettlementRepository extends AbstractRepository
{
    protected static $model = Settlement::class;
}

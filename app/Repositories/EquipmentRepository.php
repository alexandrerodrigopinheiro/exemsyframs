<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\AbstractRepository;

class EquipmentRepository extends AbstractRepository
{
    protected static $model = Equipment::class;
}

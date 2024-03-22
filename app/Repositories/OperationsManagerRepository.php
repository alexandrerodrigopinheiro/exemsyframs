<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Operations_manager;
use App\Repositories\AbstractRepository;

class Operations_managerRepository extends AbstractRepository
{
    protected static $model = Operations_manager::class;
}

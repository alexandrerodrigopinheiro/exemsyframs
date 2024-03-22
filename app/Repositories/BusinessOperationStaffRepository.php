<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Business_operation_staff;
use App\Repositories\AbstractRepository;

class Business_operation_staffRepository extends AbstractRepository
{
    protected static $model = Business_operation_staff::class;
}

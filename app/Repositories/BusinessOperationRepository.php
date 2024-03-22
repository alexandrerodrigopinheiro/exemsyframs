<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Business_operation;
use App\Repositories\AbstractRepository;

class Business_operationRepository extends AbstractRepository
{
    protected static $model = Business_operation::class;
}

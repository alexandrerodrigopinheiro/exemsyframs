<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Franchise;

class FranchiseRepository extends AbstractRepository
{
    protected static $model = Franchise::class;
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Franchise_staff;
use App\Repositories\AbstractRepository;

class Franchise_staffRepository extends AbstractRepository
{
    protected static $model = Franchise_staff::class;
}

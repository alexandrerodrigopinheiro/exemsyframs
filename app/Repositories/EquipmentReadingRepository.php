<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Equipment_reading;
use App\Repositories\AbstractRepository;

class Equipment_readingRepository extends AbstractRepository
{
    protected static $model = Equipment_reading::class;
}

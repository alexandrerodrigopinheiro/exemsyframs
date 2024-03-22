<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\AbstractRepository;

class PartnerRepository extends AbstractRepository
{
    protected static $model = Partner::class;
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Commercial_representative;
use App\Repositories\AbstractRepository;

class Commercial_representativeRepository extends AbstractRepository
{
    protected static $model = Commercial_representative::class;
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\AbstractRepository;

class SettingRepository extends AbstractRepository
{
    protected static $model = Setting::class;
}

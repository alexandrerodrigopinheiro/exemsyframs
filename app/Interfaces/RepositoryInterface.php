<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function load(): Model;

    public static function paginate(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): Collection|array;

    public static function all(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false, bool $distinct = false, bool $order_by = false): Collection|array;

    public static function first(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): ?Model;

    public static function find(mixed $id, array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): ?Model;

    public static function create(array $attributes): ?Model;

    public static function update(mixed $id, array $attributes): ?Model;

    public static function recover(mixed $id): ?Model;

    public static function delete(mixed $id): ?Model;

    public static function restore(mixed $id): ?Model;
}

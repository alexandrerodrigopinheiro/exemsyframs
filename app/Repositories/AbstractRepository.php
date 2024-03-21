<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model = Model::class;

    public static function load(): Model
    {
        return app(static::$model);
    }

    public static function paginate(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): Collection|array
    {
        $models = self::load()::query()
            ->when(! empty($where), function ($q) use ($where) {
                $keys = array_keys($where);
                $values = array_values($where);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->where($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($where_not), function ($q) use ($where_not) {
                $keys = array_keys($where_not);
                $values = array_values($where_not);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->whereNot($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($with), function ($q) use ($with) {
                for ($i = 0; $i < count($with); $i++) {
                    $q = $q->with($with[$i]);
                }

                return $q;
            })
            ->when($with_trashed, fn ($q) => $q->whereNotNull('deleted_at'))
            ->when($with_trashed, fn ($q) => $q->withTrashed())
            ->orderBy('created_at', 'asc')
            ->get();

        if (! $models) {
            return [];
        }

        return $models;
    }

    public static function all(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false, bool $distinct = false, bool $orderBy = true): Collection|array
    {
        $models = self::load()::query()
            ->when(! empty($where), function ($q) use ($where) {
                $keys = array_keys($where);
                $values = array_values($where);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->where($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($where_not), function ($q) use ($where_not) {
                $keys = array_keys($where_not);
                $values = array_values($where_not);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->whereNot($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($with), function ($q) use ($with) {
                for ($i = 0; $i < count($with); $i++) {
                    $q = $q->with($with[$i]);
                }

                return $q;
            })
            ->when($with_trashed, fn ($q) => $q->withTrashed())
            ->when($distinct, fn ($q) => $q->distinct())
            ->when($orderBy, fn ($q) => $q->orderBy('created_at', 'asc'))
            ->get();

        if (! $models) {
            return [];
        }

        return $models;
    }

    public static function first(array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): ?Model
    {
        $model = self::load()::query()
            ->when(! empty($where), function ($q) use ($where) {
                $keys = array_keys($where);
                $values = array_values($where);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->where($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($where_not), function ($q) use ($where_not) {
                $keys = array_keys($where_not);
                $values = array_values($where_not);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->whereNot($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($with), function ($q) use ($with) {
                for ($i = 0; $i < count($with); $i++) {
                    $q = $q->with($with[$i]);
                }

                return $q;
            })
            ->when($with_trashed, fn ($q) => $q->withTrashed())
            ->first();

        if (! $model) {
            return null;
        }

        return $model;
    }

    public static function find(mixed $id, array $where = [], array $where_not = [], array $with = [], bool $with_trashed = false): ?Model
    {
        $model = self::load()::query()
            ->when(! empty($where), function ($q) use ($where) {
                $keys = array_keys($where);
                $values = array_values($where);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->where($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($where_not), function ($q) use ($where_not) {
                $keys = array_keys($where_not);
                $values = array_values($where_not);

                for ($i = 0; $i < count($keys); $i++) {
                    $q = $q->whereNot($keys[$i], $values[$i]);
                }

                return $q;
            })
            ->when(! empty($with), function ($q) use ($with) {
                for ($i = 0; $i < count($with); $i++) {
                    $q = $q->with($with[$i]);
                }

                return $q;
            })
            ->when($with_trashed, fn ($q) => $q->withTrashed())
            ->find($id);

        if (! $model) {
            return null;
        }

        return $model;
    }

    public static function create(array $attibutes): ?Model
    {
        $model = self::load()::query()->create($attibutes);

        if (! $model) {
            return null;
        }

        return $model;
    }

    public static function update(mixed $id, array $attibutes, bool $with_trashed = false): ?Model
    {
        $model = self::load()::query()
            ->when($with_trashed, fn ($q) => $q->withTrashed())
            ->find($id);

        if (! $model) {
            return null;
        }

        $index = $model->update($attibutes);

        if ($index == 0) {
            return null;
        }

        return $model;
    }

    public static function recover(mixed $id): ?Model
    {
        $model = self::load()::query()
            ->withTrashed()
            ->find($id);

        if (! $model) {
            return null;
        }

        $index = $model->restore();

        if ($index == 0) {
            return null;
        }

        return $model;
    }

    public static function delete(mixed $id): ?Model
    {
        $model = self::load()::query()
            ->withTrashed()
            ->find($id);

        if (! $model) {
            return null;
        }

        $index = $model->delete();

        if ($index == 0) {
            return null;
        }

        return $model;
    }

    public static function restore(mixed $id): ?Model
    {
        $model = self::load()::query()
            ->find($id);

        if (! $model) {
            return null;
        }

        $index = $model->restore();

        if ($index == 0) {
            return null;
        }

        return $model;
    }
}

<?php

namespace Spatie\MediaLibrary\MediaCollections\Models\Concerns;

use Illuminate\Support\Str;
use MongoDB\Laravel\Eloquent\Model;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $model */
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public static function findByUuid(string $uuid): ?Model
    {
        return static::where('uuid', $uuid)->first();
    }
}

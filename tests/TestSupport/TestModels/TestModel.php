<?php

namespace Spatie\MediaLibrary\Tests\TestSupport\TestModels;

use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TestModel extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'test_models';

    protected $guarded = [];

    public $timestamps = false;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->useFallbackUrl('/default-url.jpg')
            ->useFallbackPath('/default-path.jpg');
    }
}

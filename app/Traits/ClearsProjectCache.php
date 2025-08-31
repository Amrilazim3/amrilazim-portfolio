<?php

namespace App\Traits;

use App\Services\ProjectService;

trait ClearsProjectCache
{
    protected static function bootClearsProjectCache()
    {
        static::created(function ($model) {
            ProjectService::clearCache();
        });

        static::saved(function ($model) {
            ProjectService::clearCache();
        });

        static::deleted(function ($model) {
            ProjectService::clearCache();
        });
    }
}
<?php

namespace App\Traits;

use App\Services\SkillService;

trait ClearsSkillCache
{
    protected static function bootClearsSkillCache()
    {
        static::created(function ($model) {
            SkillService::clearCache();
        });

        static::saved(function ($model) {
            SkillService::clearCache();
        });

        static::deleted(function ($model) {
            SkillService::clearCache();
        });
    }
}
<?php

namespace App\Traits;

use App\Services\CertificationService;

trait ClearsCertificationCache
{
    protected static function bootClearsCertificationCache()
    {
        static::created(function ($model) {
            CertificationService::clearCache();
        });

        static::saved(function ($model) {
            CertificationService::clearCache();
        });

        static::deleted(function ($model) {
            CertificationService::clearCache();
        });
    }
}
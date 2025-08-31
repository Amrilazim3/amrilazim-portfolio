<?php

namespace App\Traits;

use App\Services\SocialLinkService;

trait ClearsSocialLinkCache
{
    protected static function bootClearsSocialLinkCache()
    {
        static::created(function ($model) {
            SocialLinkService::clearCache();
        });

        static::saved(function ($model) {
            SocialLinkService::clearCache();
        });

        static::deleted(function ($model) {
            SocialLinkService::clearCache();
        });
    }
}
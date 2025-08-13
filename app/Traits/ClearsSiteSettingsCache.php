<?php

namespace App\Traits;

use App\Services\SiteSettingService;

trait ClearsSiteSettingsCache
{
    protected static function bootClearsSiteSettingsCache()
    {
        static::saved(function ($model) {
            SiteSettingService::clearCache();
        });

        static::deleted(function ($model) {
            SiteSettingService::clearCache();
        });
    }
}
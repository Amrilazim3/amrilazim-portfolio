<?php

namespace App\Models;

use App\Traits\ClearsSiteSettingsCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory, ClearsSiteSettingsCache;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group_name',
        'order_index',
    ];

    protected $casts = [
        'order_index' => 'integer',
    ];

    /**
     * Scope to get settings by group
     */
    public function scopeByGroup($query, string $group)
    {
        return $query->where('group_name', $group)->orderBy('order_index');
    }

    /**
     * Get a setting value by key
     */
    public static function getValue(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        return match($setting->type) {
            'json' => json_decode($setting->value, true),
            'file', 'image' => $setting->value ? asset('storage/' . $setting->value) : $default,
            default => $setting->value ?: $default
        };
    }

    /**
     * Set a setting value
     */
    public static function setValue(string $key, $value, string $type = 'text', string $group = 'general'): self
    {
        $processedValue = match($type) {
            'json' => is_string($value) ? $value : json_encode($value),
            default => $value
        };

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $processedValue,
                'type' => $type,
                'group_name' => $group,
            ]
        );
    }

    /**
     * Get settings by group as key-value array
     */
    public static function getGroupSettings(string $group): array
    {
        return static::byGroup($group)
            ->get()
            ->mapWithKeys(function ($setting) {
                $value = match($setting->type) {
                    'json' => json_decode($setting->value, true),
                    'file', 'image' => $setting->value ? asset('storage/' . $setting->value) : null,
                    default => $setting->value
                };
                
                return [$setting->key => $value];
            })
            ->toArray();
    }
}

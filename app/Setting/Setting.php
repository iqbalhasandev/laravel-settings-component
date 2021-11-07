<?php

namespace App\Setting;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting\Setting as SettingModel;

class Setting
{
    public $setting_cache = null;

    public function all($orderBy = 'DESC')
    {
        if (config('settings.cache', false)) {
            if ($orderBy == 'ASC') {
                return $this->cacheASC();
            } elseif ($orderBy == 'default') {
                return $this->cache();
            } else {
                return $this->cacheDESC();
            }
        } else {
            if ($orderBy == 'ASC') {
                return SettingModel::orderBy('order', 'asc')->get();
            } elseif ($orderBy == 'default') {
                return SettingModel::all();
            } else {
                return SettingModel::orderBy('order', 'desc')->get();
            }
        }
    }

    public function get($key, $default = null)
    {
        $settings = $this->all();
        $setting = $settings->where('key', $key)->first();
        return   $setting ?  $setting->value : $default;
    }

    /**
     *
     *
     * Short By Group
     *
     * return Group Data
     *
     */
    public function groups($orderBy = 'DESC')
    {
        $settings = $this->all($orderBy);
        $groupData = [];
        foreach ($settings as $s) {
            $groupData[$s->group][] = $s;
        }
        return $groupData;
    }
    /**
     *
     *
     * Short By Group
     *
     * return only Setting Group
     *
     */
    public function onlyGroup()
    {
        if (\config('settings.cache')) {
            return Cache::rememberForever(\config('settings.cacheKey.group'), function () {
                return SettingModel::select('group')->distinct()->pluck('group');
            });
        }
        return SettingModel::select('group')->distinct()->pluck('group');
    }



    public function cache()
    {
        return Cache::rememberForever(\config('settings.cacheKey.default'), function () {
            return SettingModel::all();
        });
    }
    public function cacheASC()
    {
        return Cache::rememberForever(\config('settings.cacheKey.asc'), function () {
            return SettingModel::orderBy('order', 'ASC')->get();
        });
    }

    public static function cacheDESC()
    {
        return Cache::rememberForever(\config('settings.cacheKey.desc'), function () {
            return SettingModel::orderBy('order', 'DESC')->get();
        });
    }
    public static function forgetCache($key = null)
    {
        Cache::forget(config('settings.cacheKey.default'));
        Cache::forget(config('settings.cacheKey.asc'));
        Cache::forget(config('settings.cacheKey.desc'));
        Cache::forget(config('settings.cacheKey.group'));
        if ($key) {
            Cache::forget($key);
        }
        return true;
    }
}

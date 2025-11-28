<?php


use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('get_logo')) {
    function get_logo()
    {
        return Cache::remember('site_logo', 3600, function () {
            $setting = Setting::where('key', 'site_logo')->first();
            return $setting ? $setting->value : 'default-logo.png';
        });
    }
}


if (!function_exists('getSetting')) {
    function getSetting($key,$default='')
    {
        return Cache::remember('site_setting_'.$key, 3600, function () use($key,$default){
            $setting = Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }
}
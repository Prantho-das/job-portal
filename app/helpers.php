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
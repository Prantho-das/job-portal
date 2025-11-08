<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    protected array $settings = [];

    public function __construct()
    {
        $this->loadSettings();
    }

    protected function loadSettings(): void
    {
        $this->settings = Cache::rememberForever('app_settings', function () {
            return Setting::all()->keyBy('key')->toArray();
        });
    }

    public function get(string $key, $default = null)
    {
        return $this->settings[$key]['value'] ?? $default;
    }

    public function has(string $key): bool
    {
        return isset($this->settings[$key]);
    }

    public function forget(string $key): void
    {
        if (isset($this->settings[$key])) {
            unset($this->settings[$key]);
            $this->clearCache(); // Clear cache after modification
        }
    }

    public function clearCache(): void
    {
        Cache::forget('app_settings');
        $this->loadSettings(); // Reload settings after clearing cache
    }
}

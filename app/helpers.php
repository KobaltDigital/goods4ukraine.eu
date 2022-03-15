<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('languages')) {
    function languages()
    {
        $cacheKey = 'languages';
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $languages = \App\Models\Language::get();
        Cache::put($cacheKey, $languages);

        return $languages;
    }
}

if (!function_exists('currentLocale')) {
    function currentLocale()
    {
        return \Illuminate\Support\Facades\App::currentLocale();
    }
}

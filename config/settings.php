<?php

return [
    'cache' => env('SETTING_CACHE', true),

    'cacheKey' => [
        'default' => '__Settings__',
        'asc' => config('settings.cacheKey.default') . '__ASC__',
        'desc' => config('settings.cacheKey.default') . '__DESC__',
        'group' => config('settings.cacheKey.default') . '__Group__',
    ]

];

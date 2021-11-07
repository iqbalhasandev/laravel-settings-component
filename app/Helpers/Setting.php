<?php // Code within app\Helpers\Helper.php


use App\Facades\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

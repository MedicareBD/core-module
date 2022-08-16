<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

if (!function_exists('logo')){
    /**
     * Get the website logo
     * @param string|null $logo
     * @return string
     */
    function logo(string $logo = null): string
    {
        if ($logo == 'favicon'){
            return asset('favicon.ico');
        }else{
            return asset('admin/img/stisla-fill.svg');
        }
    }
}


if (!function_exists('user')){
    /**
     * Get the authenticated user
     * @return User|Authenticatable|null
     */
    function user(): User|Authenticatable|null
    {
        return auth()->user();
    }
}

if (!function_exists('format_date')){
    /**
     * Get Formatted Date
     * @param $dateTime
     * @param string $format
     * @return string|null
     */
    function format_date($dateTime, string $format = 'd M, Y'): string|null
    {
        return Date::parse($dateTime)->format($format);
    }
}

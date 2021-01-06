<?php

namespace App\Models\Helpers;

class SomeClass
{
    public static function bytesToHuman($bytes)
    {
        $units = ['b', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}

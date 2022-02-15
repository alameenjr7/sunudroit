<?php

use App\Models\Setting;

if (! function_exists('short_string')) {
    function short_string($str) {
            $rest = substr($str, 0, 10);
            return $rest;
    }
}

function dateFrench($date,$style=0)
{
    switch($style)
    {
        case 0:
            if(($len_date=strlen($date)) == 10)
            {
            return preg_replace("([0-9]{4})-([0-9]{2})-([0-9]{2})","\\3/\\2/\\1",$date);
            }
            elseif($len_date == 19)
            {
            return preg_replace("([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})","\\3/\\2/\\1 à \\4h\\5",$date);
            }
        break;
        
        case 1:
            return preg_replace("([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})","\\3/\\2/\\1",$date);
        break;
    }
    
    return false;
}

if(!function_exists('get_setting'))
{
    function get_setting($key)
    {
        return Setting::value($key);
    }
}
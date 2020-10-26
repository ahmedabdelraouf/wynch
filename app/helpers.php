<?php

/**
 *  Custom Laravel Helpers
 */

use Illuminate\Support\Carbon;

if (! function_exists('carbon')) {
    function carbon($parseString = null, $tz = null)
    {
        return new Carbon($parseString, $tz);
    }
}

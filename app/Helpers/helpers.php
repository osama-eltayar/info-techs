<?php

use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if ( !function_exists('getAttributeStringByReflection') ) {
    function getAttributeStringByReflection( $reflectorClass, $property )
    {
        $reflector = new \ReflectionClass($reflectorClass);
        $constant  = '';

        foreach ( $reflector->getConstants() as $constant => $value ) {
            if ( $value == $property ) {
                $constant = str_replace('_', ' ', Str::title($constant));
                break;
            }
        }

        return $constant;
    }
}

if ( !function_exists('parseSessionDuration') ) {
    function parseSessionDuration( $duration )
    {
        $parsedDurationString = '';
        if ( floor($duration / 60) > 0 )
            $parsedDurationString .= floor($duration / 60) . ' hours ';
        if ( $duration % 60 > 0 )
            $parsedDurationString .= $duration % 60 . ' min ';
        return $parsedDurationString;
    }
}
if ( !function_exists('getLocalizeAttribute') ) {
    function getLocalizeAttribute( $propertyName )
    {
        return $propertyName . '_' . LaravelLocalization::getCurrentLocale();
    }
}

function test()
{
    return "test";
}
function formatSizeUnits($bytes)
{
    if ( $bytes >= 1073741824 ) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ( $bytes >= 1048576 ) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ( $bytes >= 1024 ) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ( $bytes > 1 ) {
        $bytes = $bytes . ' bytes';
    } elseif ( $bytes == 1 ) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}
if ( !function_exists('getSortDirection') ) {
    function getSortDirection( $prevOrder,$col )
    {
        return $prevOrder['col'] == $col && $prevOrder['direction'] == 'asc' ? 'desc' : 'asc';
    }
}

if (!function_exists('dumpFullQuery')) {
    function dumpFullQuery($builder)
    {
        $query = str_replace(array('?'), array('\'%s\''), $builder->toSql());
        return vsprintf($query, $builder->getBindings());
    }
}

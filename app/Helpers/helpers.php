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

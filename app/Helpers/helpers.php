<?php

use Illuminate\Support\Str;

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
        if (  $duration % 60 > 0 )
            $parsedDurationString .= $duration % 60 . ' min ';
        return $parsedDurationString;
    }
}

function test()
{
    return "test";
}

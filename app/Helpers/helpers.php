<?php

use Illuminate\Support\Str;

if(!function_exists('getAttributeStringByReflection'))
{
    function getAttributeStringByReflection($reflectorClass,$property)
    {
        $reflector = new \ReflectionClass($reflectorClass);
        $constant = '';

        foreach ($reflector->getConstants() as $constant => $value)
        {
            if($value == $property){
                $constant = str_replace('_',' ', Str::title($constant));
                break;
            }
        }

        return $constant;
    }
}

function test()
{
    return "test";
}

<?php


namespace App\Filters;


use Filter\Filter;

class CountryFilter extends Filter
{
    public function filterName($name)
    {
        $this->query->where('name','like',"%$name%");
    }

}

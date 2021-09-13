<?php


namespace App\Filters;


use Filter\Filter;

class CityFilter extends Filter
{

    public function filterName($name)
    {
        $this->query->where('name','like',"%$name%");
    }

    public function filterCountry($country)
    {
        $this->query->where('country_id',$country);

    }

}

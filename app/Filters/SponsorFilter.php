<?php

namespace App\Filters;

use Filter\Filter;

class SponsorFilter extends Filter
{
    public function filterName($name)
    {
        $this->query->where('name_en','like',"%$name%")
                    ->orWhere('name_ar','like',"%$name%");
    }

}

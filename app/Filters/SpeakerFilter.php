<?php


namespace App\Filters;


use Filter\Filter;

class SpeakerFilter extends Filter
{
    public function filterName($name)
    {
        $this->query->where('name_en', 'like', "%$name%")->orWhere('name_ar', 'like', "%$name%");
    }

}

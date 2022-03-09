<?php


namespace App\Filters;


use Filter\Filter;

class DiscountFilter extends Filter
{

    public function filterName($name)
    {
        $this->query->where('name', 'like', "%$name%");
    }

    public function filterType($type)
    {
        $this->query->where('type', $type);
    }

    public function filterCode($code)
    {
        $this->query->where('code', 'like', "%$code%");
    }

    public function filterStatus($status)
    {
        $this->query->where('status', $status);
    }


    public function filterCourse($course)
    {
        $this->query->whereHas('course', function ($q) use ($course) {
            $q->where('id', $course);
        });
    }
}

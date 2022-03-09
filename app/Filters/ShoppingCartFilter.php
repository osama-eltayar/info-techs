<?php


namespace App\Filters;


use Filter\Filter;

class ShoppingCartFilter extends Filter
{

    public function filterNumber($number)
    {
        $this->query->whereHas('transaction', function ($query) use ($number) {
            return $query->where('number', $number);
        });
    }

    public function filterName($name)
    {
        $this->query->whereHas('user', function ($query) use ($name) {
            return $query->where('name', 'like', "%$name%");
        });
    }

    public function filterCourseName($course_name)
    {
        $this->query->whereHas('course', function ($query) use ($course_name) {
            return $query->where('title_en', 'like', "%$course_name%");
        });
    }

    public function filterPaidAt($paid_at)
    {
        $this->query->whereDate('paid_at', '=', $paid_at);
    }

    public function filterType($type)
    {
        $this->query->whereHas('transaction', function ($query) use ($type) {
            return $query->where('type', $type);
        });
    }
}

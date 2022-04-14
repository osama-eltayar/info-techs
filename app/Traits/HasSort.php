<?php


namespace App\Traits;


trait HasSort
{
    public function scopeSort($q, $orderBy, $orderDirection)
    {
        return $q->orderBy($orderBy, $orderDirection);
    }

    public function scopeRequestSort($q)
    {
        $q->when(request()->order_by && request()->order_direction, function ($q) {
            $q->sort(request()->order_by, request()->order_direction);
        });
    }
}

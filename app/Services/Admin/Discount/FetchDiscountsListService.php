<?php

namespace App\Services\Admin\Discount;

use App\Models\Discount;
use App\Models\User;

class FetchDiscountsListService
{
    public function execute($filterData, $perPage = null)
    {
        return Discount::query()
            ->with('course', 'speciality')
            ->filter($filterData)
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}

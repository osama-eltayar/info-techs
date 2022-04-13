<?php

namespace App\Services\Admin\Owner;

use App\Models\Organization;

class FetchOwnersListService
{
    public function execute($filterData, $perPage = null)
    {
        return Organization::query()
                           ->with('city','country')
                           ->withCount('courses')
                           ->filter($filterData)
                           ->requestSort()
                           ->when(!$perPage, function ($q) {
                               return $q->get();
                           })
                           ->when($perPage, function ($q) use ($perPage) {
                               return $q->paginate($perPage);
                           });
    }
}

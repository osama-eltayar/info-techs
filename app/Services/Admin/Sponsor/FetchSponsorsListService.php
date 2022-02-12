<?php

namespace App\Services\Admin\Sponsor;

use App\Models\Organization;
use App\Models\Sponsor;

class FetchSponsorsListService
{
    public function execute($filterData, $perPage = null)
    {
        return Sponsor::query()
                           ->with('city','country')
                           ->withCount('courses')
                           ->filter($filterData)
                           ->when(!$perPage, function ($q) {
                               return $q->get();
                           })
                           ->when($perPage, function ($q) use ($perPage) {
                               return $q->paginate($perPage);
                           });
    }
}

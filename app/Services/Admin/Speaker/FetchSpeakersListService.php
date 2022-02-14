<?php

namespace App\Services\Admin\Speaker;

use App\Models\Speaker;

class FetchSpeakersListService
{
    public function execute($filterData, $perPage = null)
    {
        return Speaker::query()
                        //    ->with('city','country')
                        //    ->withCount('courses')
                           ->filter($filterData)
                           ->when(!$perPage, function ($q) {
                               return $q->get();
                           })
                           ->when($perPage, function ($q) use ($perPage) {
                               return $q->paginate($perPage);
                           });
    }
}

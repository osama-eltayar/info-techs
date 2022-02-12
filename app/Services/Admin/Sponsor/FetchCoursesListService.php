<?php

namespace App\Services\Admin\Sponsor;

use App\Models\Course;

class FetchCoursesListService
{
    public function execute($sponsor_id, $perPage = null)
    {
        return Course::query()
                     ->with(['sponsors' => function($q) use ($sponsor_id) {
                         return $q->where('sponsors.id',$sponsor_id);
                     }])
                     ->whereHas('sponsors',function ($q) use ($sponsor_id) {
                         return $q->where('sponsors.id', $sponsor_id);
                     })
                     ->when(!$perPage, function ($q) {
                         return $q->get();
                     })
                     ->when($perPage, function ($q) use ($perPage) {
                         return $q->paginate($perPage);
                     });
    }
}

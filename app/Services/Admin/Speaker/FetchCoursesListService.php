<?php

namespace App\Services\Admin\Speaker;

use App\Models\Course;

class FetchCoursesListService
{
    public function execute($speaker_id, $perPage = null)
    {
        return Course::query()
                     ->whereHas('speakers',function ($q) use ($speaker_id) {
                         return $q->where('speakers.id', $speaker_id);
                     })
                     ->when(!$perPage, function ($q) {
                         return $q->get();
                     })
                     ->when($perPage, function ($q) use ($perPage) {
                         return $q->paginate($perPage);
                     });
    }
}

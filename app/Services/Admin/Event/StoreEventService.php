<?php

namespace App\Services\Admin\Event;

use App\Models\Course;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreEventService
{
    use HasFiles;

    protected $data;
    protected $course;

    public function execute($data)
    {
        $this->data   = $data;
        $courseData   = Arr::only($this->data, [
            'price',
            'cme_count',
            'certificate',
            'type_id',
            "start_date",
            "end_date",
            'hours_count',
            'from',
            'to',
            'organization_id',
            'seats',
            'title_en',
            'title_ar',
            'description_en',
            'description_ar',
            'certificate_image',
            'location',
            'address',
            'published_at',
            'is_views_hidden',
            'speciality_id'
        ]);
        DB::beginTransaction();
        $this->course = Course::create($courseData);
        $this->storeMaterials();
        $this->storeDiscount();
        $this->course->speakers()->attach($this->data['speakers']);
        $this->course->people()->attach($this->data['chairPersons']);
        $this->storeSponsors();
        DB::commit();
    }

    protected function storeMaterials()
    {
        foreach ($this->data['materials'] as $material) {
            $this->course->materials()->create([
                'name_en' => $material->getClientOriginalName(),
                'name_ar' => $material->getClientOriginalName(),
                'path'    => $this->storeFile('courses', $material, $this->course),
                'mime_type' => $material->getClientMimeType()
            ]);
        }
    }

    protected function storeDiscount()
    {
        if ($this->data['discount']) {
            $this->course->discounts()->create([
                'date'  => $this->data['discount']['date'],
                'price' => $this->data['discount']['price'],
            ]);
        }
    }

    protected function storeSponsors()
    {
        foreach ($this->data['sponsors'] as $sponsor)
            $this->course->sponsors()->attach([
                'sponsor_id' => $sponsor['sponsor_id'],
            ],[
                'level'      => $sponsor['sponsor_type'],
                'type'       => $sponsor['sponsor_type'],
            ]);
    }
}

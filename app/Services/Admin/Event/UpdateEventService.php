<?php

namespace App\Services\Admin\Event;

use App\Models\Course;
use App\Traits\HasFiles;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateEventService
{
    use HasFiles;

    protected $data;
    protected $course;
    protected $startDateTime;
    protected $endDateTime;

    public function execute($data,$event)
    {
        $this->data = $data;
        $this->course = $event;
        $courseData = Arr::only($this->data, [
            'price',
            'cme_count',
            'certificate',
            'type_id',
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
            'speciality_id',
            'city_id',
            'country_id',
            'survey_id'
        ]);
        if (!$courseData['published_at'])
            $courseData['published_at'] = now();
        DB::beginTransaction();
        $this->course->update($courseData);
        $this->storeMaterials();
        $this->storeDiscount();
        if(isset($this->data['speakers']))
            $this->course->speakers()->sync($this->data['speakers']);
//        $this->course->people()->attach($this->data['chairPersons']);
        $this->storeSponsors();
        $this->storeSessions();
        $this->storeVideos();
        $this->storeCourseTime();
        DB::commit();
    }

    protected function storeMaterials()
    {
        if(isset($this->data['materials']) && count($this->data['materials']))
            $this->course->materials()->delete();

        foreach ($this->data['materials'] ??[] as $material) {
            $this->course->materials()->create([
                'name_en'   => $material->getClientOriginalName(),
                'name_ar'   => $material->getClientOriginalName(),
                'path'      => $this->storeFile('courses', $material, $this->course),
                'mime_type' => $material->getClientMimeType()
            ]);
        }
    }

    protected function storeDiscount()
    {
        $discount = $this->course->discounts()->latest()->first();
        $isDiscountChanged = $this->data['discount'] &&
                             $this->data['discount']['date'] != $discount->date &&
                             $this->data['discount']['price']  != $discount->price;

        if ($isDiscountChanged) {
            $this->course->discounts()->create([
                'date'  => $this->data['discount']['date'],
                'price' => $this->data['discount']['price'],
            ]);
        }
    }

    protected function storeSponsors()
    {
        if(count($this->data['sponsors']))
            $this->course->sponsors()->detach();

        foreach ($this->data['sponsors'] as $sponsor)
            $this->course->sponsors()->attach([
                'sponsor_id' => $sponsor['sponsor_id'],
            ], [
                'level' => $sponsor['sponsor_type'],
                'type'  => $sponsor['sponsor_type'],
            ]);
    }

    protected function storeSessions()
    {
        if ($this->course->isRecorded())
            return ;

        if(count($this->data['eventDateTimeData']))
            $this->course->sessions()->delete();

        foreach ($this->data['eventDateTimeData'] ??[] as $idx => $eventDateTimeData) {
            $startAt = Carbon::parse($eventDateTimeData['date'])->setTimeFromTimeString($eventDateTimeData['from_time']);
            $endAt   = Carbon::parse($eventDateTimeData['date'])->setTimeFromTimeString($eventDateTimeData['to_time']);
            $this->course->sessions()->create([
                'start_at' => $startAt,
                'end_at'   => $endAt,
                'duration' => $endAt->diffInMinutes($startAt),
            ]);
            if ($idx == 0)
                $this->startDateTime = $startAt;

            if ($idx == count($this->data['eventDateTimeData']) - 1)
                $this->endDateTime = $endAt;
        }
    }

    protected function storeCourseTime()
    {
        if ($this->course->isOnlineEvent() || $this->course->isOnlineCourse() ||  $this->course->isPhysical() || $this->course->isHybrid() )
            $this->course->update([
                'start_date' => $this->startDateTime,
                'end_date'   => $this->endDateTime
            ]);

        if($this->course->isRecorded())
            $this->course->update([
                'start_date' => now(),
            ]);
    }

    protected function storeVideos()
    {
        if (!($this->course->isRecorded() || $this->course->isHybrid()) )
            return;

        if(count($this->data['recordedSessions']))
            $this->course->videos()->delete();

        foreach ($this->data['recordedSessions'] ?? [] as $recordedSession)
            $this->course->videos()->create([
                'name_en' => $recordedSession['title'],
                'name_ar' => $recordedSession['title'],
                'url'     => $recordedSession['url'],
                'is_free' => $recordedSession['is_free']
            ]);
    }
}


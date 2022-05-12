<?php

namespace App\Services\Admin\Event;

use App\Models\Course;
use App\Models\CourseSession;
use App\Traits\HasFiles;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreEventService
{
    use HasFiles;

    protected $data;
    /**
     * @var Course
     * */
    protected $course;
    protected $startDateTime;
    protected $endDateTime;

    public function execute($data)
    {
        $this->data = $data;
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
            'city_id',
            'country_id',
            'survey_id'
        ]);
        if (!$courseData['published_at'])
            $courseData['published_at'] = now();
        DB::beginTransaction();
        $this->course = Course::create($courseData);
        $this->storeMaterials();
        $this->storeMedia();
        $this->storeDiscount();
        if(isset($this->data['speakers']))
            $this->course->speakers()->attach($this->data['speakers']);
//        $this->course->people()->attach($this->data['chairPersons']);
        if (isset($this->data['specialities']) && count($this->data['specialities']))
            $this->course->specialities()->attach($this->data['specialities']);
        $this->storeSponsors();
        $this->storeSessions();
        $this->storeVideos();
        $this->storeCourseTime();
        DB::commit();
    }

    protected function storeMaterials()
    {
        foreach ($this->data['materials'] as $material) {
            $this->course->materials()->create([
                'name_en'   => $material->getClientOriginalName(),
                'name_ar'   => $material->getClientOriginalName(),
                'path'      => $this->storeFile('courses', $material, $this->course),
                'mime_type' => $material->getClientMimeType()
            ]);
        }
    }

    protected function storeMedia()
    {
        $mediaData = [];
        if (isset($this->data['event_media']['top_side']) && $this->data['event_media']['top_side'])
            $mediaData['top_side'] = $this->storeFile('courses', $this->data['event_media']['top_side'], $this->course);
        if (isset($this->data['event_media']['left_side']) && $this->data['event_media']['left_side'])
            $mediaData['left_side'] = $this->storeFile('courses', $this->data['event_media']['left_side'], $this->course);
        $this->course->update($mediaData);
    }

    protected function storeDiscount()
    {
        if (isset($this->data['discount']) && count($this->data['discount']) && $this->data['discount']['price']) {
            $this->course->discounts()->create([
                'date'  => $this->data['discount']['date'] ?? null,
                'price' => $this->data['discount']['price'] ,
            ]);
        }
    }

    protected function storeSponsors()
    {
        if (isset($this->data['sponsors']))
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

        foreach ($this->data['eventDateTimeData'] ??[] as $idx => $eventDateTimeData) {
            $startAt = Carbon::parse($eventDateTimeData['date'])->setTimeFromTimeString($eventDateTimeData['from_time']);
            $endAt   = Carbon::parse($eventDateTimeData['date'])->setTimeFromTimeString($eventDateTimeData['to_time']);
            $this->course->sessions()->create([
                'start_at' => $startAt,
                'end_at'   => $endAt,
                'duration' => $endAt->diffInMinutes($startAt),
                'type'     => $this->getSessionType()
            ]);
            if ($idx == 0)
                $this->startDateTime = $startAt;

            if ($idx == count($this->data['eventDateTimeData']) - 1)
                $this->endDateTime = $endAt;
        }
    }

    private function getSessionType()
    {
        if ($this->course->isOnlineCourse() || $this->course->isOnlineEvent())
            return CourseSession::ONLINE;

        if ($this->course->isPhysical())
            return CourseSession::PHYSICAL;

        return null;
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

        foreach ($this->data['recordedSessions'] ?? [] as $recordedSession)
            $this->course->videos()->create([
                'name_en' => $recordedSession['title'],
                'name_ar' => $recordedSession['title'],
                'url'     => $recordedSession['url'],
                'is_free' => $recordedSession['is_free']
            ]);
    }
}


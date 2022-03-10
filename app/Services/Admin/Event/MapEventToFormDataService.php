<?php

namespace App\Services\Admin\Event;

class MapEventToFormDataService
{
    public function execute($event)
    {
        $eventData                         = [];
        $eventData['titleAr']              = $event->title_ar;
        $eventData['titleEn']              = $event->title_en;
        $eventData['certificate']          = $event->certificate;
        $eventData['typeId']               = $event->type_id;
        $eventData['seats']                = $event->seats;
        $eventData['cmeCount']             = $event->cme_count;
        $eventData['specialityId']         = $event->speciality_id;
        $eventData['organization_id']      = $event->organization_id;
        $eventData['location']             = $event->location;
        $eventData['address']              = $event->address;
        $eventData['countryId']            = $event->country_id;
        $eventData['cityId']               = $event->city_id;
        $eventData['survey_id']            = $event->survey_id;
        $eventData['descriptionEn']        = $event->description_en;
        $eventData['descriptionAr']        = $event->description_ar;
        $eventData['is_publish_scheduled'] = $event->is_publish_scheduled;
        $eventData['is_views_hidden']      = $event->is_views_hidden;
        $eventData['price']                = $event->price;
        $eventData['published_at']         = $event->published_at->format('Y-m-d\TH:i');
        $eventData['eventDateTimeData']    = $event->sessions
                                                    ->map(function ($session) {
                                                        $data              = [];
                                                        $data['date']      = $session->start_at->toDateString();
                                                        $data['from_time'] = $session->start_at->toTimeString();
                                                        $data['to_time']   = $session->end_at->toTimeString();
                                                        return $data;
                                                    })
                                                    ->toArray();
        $eventData['sponsors']             = $event->sponsors
                                                    ->map(function ($sponsor) {
                                                        $data                 = [];
                                                        $data['sponsor_id']   = $sponsor->id;
                                                        $data['sponsor_type'] = $sponsor->pivot->level;
                                                        return $data;
                                                    })
                                                    ->toArray();
        $eventData['recordedSessions']     = $event->videos
                                                    ->map(function ($video) {
                                                        $data            = [];
                                                        $data['url']     = $video->url;
                                                        $data['is_free'] = $video->is_free;
                                                        $data['title']   = $video->name_en;
                                                        return $data;
                                                    })
                                                    ->toArray();

        $eventData['speakers']     = $event->speakers()->pluck('speakers.id')->toArray();
        $eventData['chairPersons'] = $eventData['speakers'];
        $eventData['discount']     = $event->discounts()->latest()->first() ?: [];
        return $eventData;
    }
}

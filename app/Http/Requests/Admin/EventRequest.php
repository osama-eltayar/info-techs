<?php

namespace App\Http\Requests\Admin;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        foreach ($this->all() as $key => $value) {
            $this->merge([
                Str::snake($key) => $value
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_en'                      => ['required', 'string'],
            'title_ar'                      => ['required', 'string'],
            'description_en'                => ['required', 'string'],
            'description_ar'                => ['required', 'string'],
            'price'                         => ['required', 'numeric'],
            'cme_count'                     => ['nullable', 'integer'],
            'certificate'                   => ['required', 'numeric'],
            'type_id'                       => ['required', 'exists:course_types,id'],
            'organization_id'               => ['required', 'exists:organizations,id'],
            'seats'                         => ['nullable', 'integer'],
            'location'                      => [Rule::requiredIf(!in_array($this->type_id, [Course::ONLINE_COURSE, Course::ONLINE_EVENT])),] + ($this->location ? ['string'] : []),
            'address'                       => [Rule::requiredIf(!in_array($this->type_id, [Course::ONLINE_COURSE, Course::ONLINE_EVENT])),] + ($this->address ? ['string'] : []),
            'published_at'                  => ['sometimes','nullable', 'date'],
            'is_views_hidden'               => ['sometimes', 'boolean'],
            'country_id'                    => ['required', 'exists:countries,id'],
            'city_id'                       => ['required', 'exists:cities,id'],
            'specialities'                  =>  ['nullable', 'array','filled','distinct'],
            'specialities.*'                => ['required', 'exists:specialities,id'],
            'materials'                     => [Rule::requiredIf($this->isMethod('POST')), 'array', 'filled'],
            'materials.*'                   => ['required', 'file'],
            'event_media'                   => ['nullable','array','filled'],
            'event_media.*'                 => ['nullable','image'],
            'event_media.top_side'          => ['nullable','image','max:' . 10 * 1024,Rule::dimensions()->height(521)->width(793)],
            'event_media.left_side'         => ['nullable','image','max:' . 10 * 1024,Rule::dimensions()->height(521)->width(793)],
            'discount'                      => ['nullable', 'array', 'filled', 'distinct'],
            'discount.date'                 => ['nullable','sometimes', 'date', 'after_or_equal:today'],
            'discount.price'                => ['required_with:discount.date',],
            'sponsors'                      => ['nullable', 'array', 'filled', 'distinct'],
            'sponsors.*'                    => ['required', 'array', 'filled', 'distinct'],
            'sponsors.*.sponsor_id'         => ['required', 'exists:sponsors,id'],
            'sponsors.*.sponsor_type'       => ['required'],
            'confirmed'                     => ['required', 'in:1'],
            'eventDateTimeData'             => [Rule::requiredIf(in_array($this->type_id, [Course::ONLINE_COURSE, Course::ONLINE_EVENT, Course::PHYSICAL, Course::HYBRID])), 'array', 'filled', 'distinct'],
            'eventDateTimeData.*'           => ['required', 'array', 'filled', 'distinct'],
            'eventDateTimeData.*.date'      => ['required', 'date'],
            'eventDateTimeData.*.from_time' => ['required'],
            'eventDateTimeData.*.to_time'   => ['required'],
            'recordedSessions'              => [Rule::requiredIf(in_array($this->type_id, [Course::RECORDED])), 'array', 'filled', 'distinct'],
            'recordedSessions.*'            => ['required', 'array', 'filled', 'distinct'],
            'recordedSessions.*.is_free'    => ['required', 'boolean'],
            'recordedSessions.*.url'        => ['required', 'url'],
            'recordedSessions.*.title'      => ['required', 'string'],
            'survey_id'                     => ['nullable', 'exists:surveys,id'],
            'speakers'                      => ['nullable', 'array', 'filled', 'distinct'],
            'speakers.*'                    => ['required', 'exists:speakers,id'],
            'chairPersons'                  => ['nullable', 'array', 'filled', 'distinct'],
            'chairPersons.*'                => ['required', 'exists:speakers,id'],
        ];
    }
}

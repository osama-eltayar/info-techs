<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpeakerRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private static $maxImageSize = 5 * 1024;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en'       => [ 'required', 'string' ],
            'name_ar'       => [ 'required', 'string' ],
            'position'      => [ 'required', 'string' ],
            'bio'           => [ 'required', 'string' ],
            'image'         => [ Rule::requiredIf($this->isMethod('POST')), 'image', 'max:' . self::$maxImageSize ],
            'email'         => [ 'required', 'email', 'unique:speakers,email,' . optional($this->speaker)->id ],
            'mobile'        => [ 'required', 'string', 'unique:speakers,mobile,' . optional($this->speaker)->id ],
            'country_id'    => [ 'nullable', 'exists:countries,id' ],
            'city_id'       => [ 'nullable', 'exists:cities,id' ],
            'user_title_id' => [ 'required', 'exists:user_titles,id' ],
            'speciality_id' => [ 'required', 'exists:specialities,id' ],
        ];
    }
}

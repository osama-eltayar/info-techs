<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'profile.title'         => ['required'],
            'profile.nationality'   => ['required'],
            'profile.job'           => [],
            'profile.mobile'        => ['required'],
            'profile.saudi_council' => [],
            'profile.image'         => [],
            'profile.speciality_id' => ['required'],
            'profile.country_id'    => ['required','exists:countries,id'],
            'profile.city_id'       => ['required','exists:cities,id'],
            'user.name'             => [],
        ];
    }
}

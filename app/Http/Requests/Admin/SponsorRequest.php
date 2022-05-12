<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SponsorRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private static $maxLogoSize = 5 * 1024;
    /**
     * @var mixed
     */
    private static $maxMaterialSize = 20 * 1024;


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
            'name_en'    => [ 'required', 'string' ],
            'name_ar'    => [ 'required', 'string' ],
            'logo'       => [ Rule::requiredIf($this->isMethod('POST')), 'image', 'max:' . self::$maxLogoSize ],
            'material'   => [ 'nullable', 'file', 'mimes:pdf', 'max:' . self::$maxMaterialSize ],
            'email'      => [ 'required', 'email', 'unique:sponsors,email,' . optional(optional($this->sponsor)->user)->id ],
            'mobile'     => [ 'required', 'string', 'unique:sponsors,mobile,' . optional(optional($this->sponsor)->user)->id  ],
            'country_id' => [ 'required', 'exists:countries,id' ],
            'city_id'    => [ 'required', 'exists:cities,id' ]
        ];
    }
}

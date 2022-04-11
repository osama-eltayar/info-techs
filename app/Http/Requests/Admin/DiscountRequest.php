<?php

namespace App\Http\Requests\Admin;

use App\Enums\DiscountAmountTypeEnum;
use App\Models\Discount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscountRequest extends FormRequest
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

//    protected function prepareForValidation()
//    {
//        if ($this->course_id)
//            $this->merge([
//                'speciality_id' => null
//            ]);
//        if ($this->speciality_id)
//            $this->merge([
//                'course_id' => null
//            ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type'              => ['required', Rule::in([Discount::INDIVIDUAL, Discount::GENERAL])],
            'name'              => ['required', 'string', 'max:100'],
            'code'              => ['required', 'string', 'max:100', 'unique:discounts,code,' . optional($this->discount)->id],
            'amount'            => ['required', 'numeric'],
            'amount_type'       => ['required', Rule::in(DiscountAmountTypeEnum::CASH, DiscountAmountTypeEnum::PERCENTAGE)],
            'generation_number' => ['required', 'integer'],
            'limit_usage'       => ['required', 'integer'],
            'course_id'         => ['nullable'] + ($this->course_id ? ['exists:courses,id'] : []),
            'speciality_id'     => ['nullable'] + ($this->speciality_id ? ['exists:specialities,id'] : []),
            'start_date'        => ['required', 'date'],
            'end_date'          => ['required', 'date'],
        ];
        if ($this->isMethod('POST') || ($this->isMethod('PUT') && $this->start_date != $this->discount->start_date)) {
            $rules['start_date'][] = 'before:end_date';
            $rules['start_date'][] = 'after_or_equal:today';
        }
        if ($this->isMethod('POST') || ($this->isMethod('PUT') && $this->end_date != $this->discount->end_date)) {
            $rules['end_date'][] = 'after:start_date';
        }
        return $rules;
    }

}

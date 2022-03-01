<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DiscountAmountTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Course;
use App\Models\Discount;
use App\Models\Speciality;
use Symfony\Component\HttpFoundation\Response;

class DiscountController extends Controller
{
    public function create()
    {
        $discountAmountTypes = DiscountAmountTypeEnum::MAPPED_TYPES;
        $discountTypes       = ['Individual' => Discount::INDIVIDUAL, 'General' => Discount::GENERAL];
        $courses             = Course::all();
        $specialities        = Speciality::all();
        return view('admin.discounts.create', compact('discountTypes', 'discountAmountTypes', 'courses', 'specialities'));
    }

    public function store(DiscountRequest $request)
    {
        $discountData = $request->only([
            'type',
            'name',
            'code',
            'amount',
            'amount_type',
            'generation_number',
            'limit_usage',
            'course_id',
            'speciality_id',
            'start_date',
            'end_date'
        ]);
        Discount::create($discountData);
        return $this->successResponse([
            'redirect' => route('admin.discounts.index')
        ], 'Discount Created Successfully.', Response::HTTP_CREATED);
    }
}

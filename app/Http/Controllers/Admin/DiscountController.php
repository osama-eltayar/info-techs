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
        Discount::create($request->validated());
        return $this->successResponse([
            'redirect' => route('admin.discounts.index')
        ], 'Discount Created Successfully.', Response::HTTP_CREATED);
    }

    public function edit(Discount $discount)
    {
        $discountAmountTypes = DiscountAmountTypeEnum::MAPPED_TYPES;
        $discountTypes       = ['Individual' => Discount::INDIVIDUAL, 'General' => Discount::GENERAL];
        $courses             = Course::all();
        $specialities        = Speciality::all();
        return view('admin.discounts.edit', compact('discountTypes', 'discountAmountTypes', 'courses', 'specialities','discount'));
    }

    public function update(DiscountRequest $request,Discount $discount)
    {
        $discount->update($request->validated());
        return $this->successResponse([
            'redirect' => route('admin.discounts.index')
        ], 'Discount Created Successfully.', Response::HTTP_CREATED);
    }
}

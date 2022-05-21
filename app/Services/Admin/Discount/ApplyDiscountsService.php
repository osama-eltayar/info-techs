<?php

namespace App\Services\Admin\Discount;

use App\Enums\DiscountAmountTypeEnum;
use App\Models\Discount;
use App\Models\DiscountUser;

class ApplyDiscountsService
{
    public function execute($user, $code)
    {
        $discount = Discount::where('code', $code)->firstOrFail();
        $now = now();

        if ($discount->start_date > $now || $discount->end_date < $now)
        {
            return [
                'data' => 'not valid',
                'status' => 400
            ];
        }

        if ($discount->valid_generation_number == 0)
        {
            return [
                'data' => 'not valid',
                'status' => 400
            ];
        }

        $courses = $user->shoppingCart()->wherePivot('paid_at', null)->with('specialities')->get();

        if ($discount->course_id)
        {
            $foundedCourse = null;

            $courses->each(function ($course) use ($discount, &$foundedCourse) {
                if ($course->id == $discount->course_id)
                {
                    $foundedCourse = $course;
                    DiscountUser::where('shopping_cart_id', $course->pivot->id)->delete();

                    return false;
                }
            });

            if (!$foundedCourse)
            {
                return [
                    'data' => 'not valid',
                    'status' => 400
                ];
            }
            else
            {
                $discountUser = $this->applyDiscountOnCart($discount, $user, $foundedCourse, $foundedCourse->pivot->id);

                return [
                    'data' => [
                        'discount_user' => $discountUser,
                        'course' => $foundedCourse
                    ],
                    'status' => 200
                ];
            }
        }

        $specialities = $discount->specialities;

        if ($specialities->count() > 0)
        {
            $foundedCourse = false;

            $courses->each(function ($course) use ($specialities, &$foundedCourse) {
                if ($course->specialities()->whereIn('specialities.id', $specialities->pluck('id'))->count() > 0)
                {
                    $foundedCourse = $course;
                    DiscountUser::where('shopping_cart_id', $course->pivot->id)->delete();

                    return false;
                }
            });

            if (!$foundedCourse)
            {
                return [
                    'data' => 'not valid',
                    'status' => 400
                ];
            }
            else
            {
                $discountUser = $this->applyDiscountOnCart($discount, $user, $foundedCourse, $foundedCourse->pivot->id);

                return [
                    'data' => [
                        'discount_user' => $discountUser,
                        'course' => $foundedCourse
                    ],
                    'status' => 200
                ];
            }
        }

        $userDiscount = $user->discounts()->wherePivot('discount_id', $discount->id)->get();

        if ($userDiscount && $userDiscount->count() >= $discount->limit_usage)
        {
            return [
                'data' => 'not valid',
                'status' => 400
            ];
        }

        $course = $user->shoppingCart()->first();
        $discountUser = $this->applyDiscountOnCart($discount, $user, $course, $course->pivot->id);

        return [
            'data' => [
                'discount_user' => $discountUser,
                'course' => $course
            ],
            'status' => 200
        ];
    }

    private function applyDiscountOnCart($discount, $user, $course, $shoppingCartId)
    {
        $amount = 0;

        if ($discount->amount_type == DiscountAmountTypeEnum::CASH)
        {
            $amount = $discount->amount;
        }
        else if ($discount->amount_type == DiscountAmountTypeEnum::PERCENTAGE)
        {
            $amount = $discount->amount / 100.0 * $course->price;
        }

        $discount->update([
            'valid_generation_number' => $discount->valid_generation_number - 1
        ]);

        return DiscountUser::create([
            'discount_id' => $discount->id,
            'user_id' => $user->id,
            'shopping_cart_id' => $shoppingCartId,
            'amount' => $amount,
            'end_date' => $discount->end_date
        ]);
    }
}

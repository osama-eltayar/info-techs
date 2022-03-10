<?php

namespace App\Enums;

class DiscountAmountTypeEnum
{
    const CASH   = 1;
    const PERCENTAGE = 2;

    const MAPPED_TYPES
    = [
        [
            'name'  => 'SAR',
            'value' => self::CASH
        ],
        [
            'name'  => '%',
            'value' => self::PERCENTAGE
        ]
    ];
}

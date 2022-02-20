<?php

namespace App\Enums;

class SponsorTypeEnum
{
    const GOLD   = 1;
    const SILVER = 2;

    const MAPPED_TYPES
        = [
            [
                'name'  => 'Gold',
                'value' => self::GOLD
            ],
            [
                'name'  => 'Sliver',
                'value' => self::SILVER
            ]
        ];
}

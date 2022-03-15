<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self OFFER()
 * @method static self REQUEST()
 */
final class AdTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'OFFER' => 'Offered',
            'REQUEST' => 'Wanted',
        ];
    }

    protected static function labels(): array
    {
        return [
            'OFFER' => __('Offered'),
            'REQUEST' => __('Wanted'),
        ];
    }
}

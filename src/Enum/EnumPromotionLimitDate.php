<?php 
namespace App\Enum;

enum EnumPromotionLimitDate: string
{
    case START_DATE = 'start_date';
    case END_DATE = 'end_date';
    case ANOTHER = 'another';
    case ONE_WEEK = 'one_week';
    case TWO_WEEKS = 'two_weeks';
    case THREE_WEEKS = 'three_weeks';
    case ONE_MONTH = 'one_month';

    public static function getValues(): array
    {
        return [
            self::START_DATE,
            self::END_DATE,
            self::ANOTHER,
            self::ONE_WEEK,
            self::TWO_WEEKS,
            self::THREE_WEEKS,
            self::ONE_MONTH
        ];
    }
}
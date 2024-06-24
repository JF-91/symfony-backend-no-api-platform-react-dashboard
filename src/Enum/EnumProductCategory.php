<?php
namespace App\Enum;

enum EnumProductCategory: string
{
    case TSHIRT = 'tshirt';
    case PAINTING = 'painting';
    case ART = 'art';
    case ANOTHER = 'another';

    public static function getValues(): array
    {
        return [
            self::TSHIRT,
            self::PAINTING,
            self::ART,
            self::ANOTHER
        ];
    }
}
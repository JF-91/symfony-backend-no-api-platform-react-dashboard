<?php 
namespace App\Enum;

enum EnumNewsCategory: string
{
    case ART = 'art';
    case PRODUCTS = 'products';
    case PAINTING = 'painting';
    case ANOTHER = 'another';

    public static function getValues(): array
    {
        return [
            self::ART,
            self::PRODUCTS,
            self::PAINTING,
            self::ANOTHER
        ];
    }
}
<?php 

namespace App\Dto\ProductDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ProductUpdateDto
{
    public const GROUP_PRODUCT_READ = 'product:read';
    public const GROUP_PRODUCT_WRITE = 'product:write';

    public const GROUP_PRODUCT_READ_WRITE = [
        self::GROUP_PRODUCT_READ,
        self::GROUP_PRODUCT_WRITE
    ];

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([self::GROUP_PRODUCT_READ, self::GROUP_PRODUCT_WRITE])]
    public ?string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    #[Groups([self::GROUP_PRODUCT_READ, self::GROUP_PRODUCT_WRITE])]
    public ?string $description;

    #[Groups([self::GROUP_PRODUCT_READ, self::GROUP_PRODUCT_WRITE])]
    public ?float $price;

    #[Groups([self::GROUP_PRODUCT_READ, self::GROUP_PRODUCT_WRITE])]
    public ?bool $isPublished;

    #[Groups([self::GROUP_PRODUCT_READ, self::GROUP_PRODUCT_WRITE])]
    public ?int $productCategoryId;
}
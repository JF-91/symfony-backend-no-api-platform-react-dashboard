<?php 
namespace App\Dto\ProductDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ProductReadDto
{
    public const GROUP_PRODUCT_READ = 'product:read';

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?int $id;

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?string $name;

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?string $description;

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?float $price;

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?bool $isPublished;

    #[Groups([self::GROUP_PRODUCT_READ])]
    public ?\DateTimeImmutable $createdAt;
}
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

    

    /**
     * Get the value of name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of isPublished
     */
    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    /**
     * Set the value of isPublished
     */
    public function setIsPublished(?bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get the value of productCategoryId
     */
    public function getProductCategoryId(): ?int
    {
        return $this->productCategoryId;
    }

    /**
     * Set the value of productCategoryId
     */
    public function setProductCategoryId(?int $productCategoryId): self
    {
        $this->productCategoryId = $productCategoryId;

        return $this;
    }
}
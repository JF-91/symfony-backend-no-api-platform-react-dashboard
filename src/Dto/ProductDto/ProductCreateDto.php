<?php 

namespace App\Dto\ProductDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ProductCreateDto 
{
    const GROUP_PRODUCT_WRITE = 'product:write';

    #[Assert\NotBlank]
    #[Groups([self::GROUP_PRODUCT_WRITE])]
    public string $name;

    #[Assert\NotBlank]
    #[Groups([self::GROUP_PRODUCT_WRITE])]
    public string $description;

    #[Assert\NotBlank]
    #[Groups([self::GROUP_PRODUCT_WRITE])]
    public float $price;

    #[Assert\NotBlank]
    #[Groups([self::GROUP_PRODUCT_WRITE])]
    public bool $isPublished;

    

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of isPublished
     */
    public function getIsPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * Set the value of isPublished
     */
    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }
}
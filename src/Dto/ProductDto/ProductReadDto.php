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

    

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

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
     * Get the value of createdAt
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
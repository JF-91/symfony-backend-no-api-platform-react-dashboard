<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: 'products')]
class Product
{
 
    public const GROUP_PRODUCT_READ = 'product:read';
    public const GROUP_PRODUCT_WRITE = 'product:write';

    public const GROUP_PRODUCT_READ_WRITE = [
        self::GROUP_PRODUCT_READ,
        self::GROUP_PRODUCT_WRITE
    ];

    public function __construct() {
        $this->createdAt = new DateTimeImmutable();
        $this->isPublished = false;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 180, nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([Product::GROUP_PRODUCT_READ, Product::GROUP_PRODUCT_WRITE])]
    private ?string $name;

    #[ORM\Column(nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    #[Groups([Product::GROUP_PRODUCT_READ, Product::GROUP_PRODUCT_WRITE])]
    private ?string $description;

    #[ORM\Column(nullable: false)]
    #[Groups([Product::GROUP_PRODUCT_READ, Product::GROUP_PRODUCT_WRITE])]
    private ?float $price;

    #[ORM\Column]
    #[Groups([Product::GROUP_PRODUCT_READ, Product::GROUP_PRODUCT_WRITE])]
    private ?bool $isPublished;

    #[ORM\Column]
    #[Groups([Product::GROUP_PRODUCT_READ])]
    private DateTimeImmutable $createdAt;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ProductCategory $productCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->productCategory;
    }

    public function setProductCategory(?ProductCategory $productCategory): static
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->productCategory ? $this->productCategory->getCategoryName() : null;
    }

   public function setCategoryName(?string $categoryName): static
    {
        if ($this->productCategory) {
            $this->productCategory->setCategoryName($categoryName);
        }

        return $this;
    }

}

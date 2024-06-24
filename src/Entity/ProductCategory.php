<?php

namespace App\Entity;

use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Enum\EnumProductCategory;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: ProductCategoryRepository::class)]
#[ORM\Table(name: 'product_categories')]
class ProductCategory
{

    const GROUP_PRODUCT_CATEGORY_READ = 'product_category:read';
    const GROUP_PRODUCT_CATEGORY_WRITE = 'product_category:write';

    public function __construct() {
        $this->productCategory = EnumProductCategory::ANOTHER;
        $this->products = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([ProductCategory::GROUP_PRODUCT_CATEGORY_READ, ProductCategory::GROUP_PRODUCT_CATEGORY_WRITE])]
    private ?string $categoryName;

    #[ORM\Column(nullable: true)]
    #[Groups([ProductCategory::GROUP_PRODUCT_CATEGORY_READ, ProductCategory::GROUP_PRODUCT_CATEGORY_WRITE])]
    private ?string $description;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'productCategory')]
    private Collection $products;

    #[ORM\Column]
    #[Groups([ProductCategory::GROUP_PRODUCT_CATEGORY_READ])]
    private DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'string', length: 255, enumType: EnumProductCategory::class)]
    #[Groups([ProductCategory::GROUP_PRODUCT_CATEGORY_READ, ProductCategory::GROUP_PRODUCT_CATEGORY_WRITE])]
    private EnumProductCategory $productCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    #[Groups([ProductCategory::GROUP_PRODUCT_CATEGORY_READ])]
    public function getCategories(): array
    {
        return EnumProductCategory::getValues();

    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setProductCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProductCategory() === $this) {
                $product->setProductCategory(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getProductCategory(): EnumProductCategory
    {
        return $this->productCategory;
    }

    public function setProductCategory(EnumProductCategory $productCategory): static
    {
        $this->productCategory = $productCategory;

        return $this;
    }
}

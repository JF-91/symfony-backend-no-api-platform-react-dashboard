<?php 

namespace App\Service;

use App\Dto\ProductDto\ProductCreateDto;
use App\Dto\ProductDto\ProductReadDto;
use App\Dto\ProductDto\ProductUpdateDto;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ProductService
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function createProduct (string $data): void
    {
        $productCreateDTO = $this->serializer->deserialize($data, ProductCreateDto::class, 'json', ['groups' => 'product:write']);

        $product = new Product();
        $product->setName($productCreateDTO->name);
        $product->setDescription($productCreateDTO->description);
        $product->setPrice($productCreateDTO->price);
        $product->setIsPublished($productCreateDTO->isPublished);
        $product->setProductCategory($productCreateDTO->productCategoryId);

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function updateProduct(int $id, string $data): void
    {
        $product = $this->entityManager->getRepository(Product::class)->find($id);
        if (!$product) {
            throw new \Exception('Product not found');
        }

        /** @var ProductDto $productUpdateDTO */
        $productUpdateDTO = $this->serializer->deserialize($data, ProductUpdateDto::class, 'json', ['groups' => 'product:write']);
        
        $product->setName($productUpdateDTO->name);
        $product->setDescription($productUpdateDTO->description);
        $product->setPrice($productUpdateDTO->price);
        $product->setIsPublished($productUpdateDTO->isPublished);
        $product->setProductCategory($productUpdateDTO->productCategoryId);
        
        $this->entityManager->flush();
    }

    public function getProduct(int $id): ?string
    {
        $product = $this->entityManager->getRepository(Product::class)->find($id);
        if (!$product) {
            throw new \Exception('Product not found');
        }

        $productReadDTO = new ProductReadDto();
        $productReadDTO->id = $product->getId();
        $productReadDTO->name = $product->getName();
        $productReadDTO->description = $product->getDescription();
        $productReadDTO->price = $product->getPrice();
        $productReadDTO->isPublished = $product->getIsPublished();
        $productReadDTO->createdAt = $product->getCreatedAt();

        return $this->serializer->serialize($productReadDTO, 'json', ['groups' => 'product:read']);
    }
}
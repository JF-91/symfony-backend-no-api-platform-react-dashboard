<?php

namespace App\Controller\Api;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    private $repository;
    private $serializer;
    private $entityManager;

    public function __construct(
        ProductRepository $repository,
         SerializerInterface $serializer,
          EntityManagerInterface $entityManager
          )
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    #[Route('/product', name: 'app_product', methods: ['GET'])]
    public function index(): JsonResponse
    {
        try {
            $products = $this->repository->findAll();
            $data = $this->serializer->serialize($products, 'json');
            return new JsonResponse($data, 200, [], true);
            
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), 500);
        }
    }

    #[Route('/product/{id}', name: 'app_product_show', methods: ['GET'])]
    public function show($id): JsonResponse
    {
        try {
            $product = $this->repository->find($id);
            $data = $this->serializer->serialize($product, 'json');
            return new JsonResponse($data, 200, [], true);
            
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), 500);
        }
    }

    #[Route('/product', name: 'app_product_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        try {
            $data = $request->getContent();
            $product = $this->serializer->deserialize($data, Product::class, 'json', ['groups' => Product::GROUP_PRODUCT_WRITE]);
            $this->entityManager->persist($product);
            $this->entityManager->flush();
            return new JsonResponse('Product created', 201);
            
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), 500);
            
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), 500);
        }
    }

    #[Route('/product/{id}', name: 'app_product_update', methods: ['PUT'])]
    public function update($id, Request $request): JsonResponse
    {
        try {
            $product = $this->repository->find($id);
            if (!$product) {
                return new JsonResponse('Product not found', 404);
            }
            
            $data = $request->getContent();
            $product = $this->serializer->deserialize($data, Product::class, 'json', ['groups' => Product::GROUP_PRODUCT_WRITE]);
            $this->entityManager->flush();
            return new JsonResponse('Product updated', 200);
            
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), 500);
        }
    }
}

<?php

namespace App\Service;

use App\Dto\NewsDto\NewsReadDto;
use App\Dto\NewsDto\NewsUpdateDto;
use App\Repository\NewsRepository;
use App\Service\SerializerService;
use Doctrine\ORM\EntityManagerInterface;

class NewsService
{
    private EntityManagerInterface $entityManager;
    private SerializerService $serializerService;
    private NewsRepository $newsRepository;

    public function __construct(EntityManagerInterface $entityManager, SerializerService $serializerService, NewsRepository $newsRepository)
    {
        $this->entityManager = $entityManager;
        $this->serializerService = $serializerService;
        $this->newsRepository = $newsRepository;
    }

    public function updateNews(int $id, string $data): void
    {
        $news = $this->newsRepository->find($id);
        if (!$news) {
            throw new \Exception('News not found');
        }

        /** @var NewsUpdateDto $newsUpdateDTO */
        $newsUpdateDTO = $this->serializerService->deserialize($data, NewsUpdateDto::class, 'json', ['groups' => 'news:write']);
        
        $news->setTitle($newsUpdateDTO->title);
        $news->setContent($newsUpdateDTO->content);
        $news->setIsPublished($newsUpdateDTO->isPublished);
        
        $this->entityManager->flush();
    }

    public function getNews(int $id): ?string
    {
        $news = $this->newsRepository->find($id);
        if (!$news) {
            throw new \Exception('News not found');
        }

        return $this->serializerService->serialize(NewsReadDto::class, 'json', ['groups' => 'news:read']);
    }
}
<?php

namespace App\Entity;

use App\Enum\EnumNewsCategory;
use App\Repository\NewsRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    const GROUP_NEWS_READ = 'news:read';
    const GROUP_NEWS_WRITE = 'news:write';

    public function __construct() {
        $this->createdAt = new DateTimeImmutable();
        $this->isPublished = false;
        $this->newsCategory = EnumNewsCategory::ANOTHER;
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private ?string $image_url = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private ?string $video_url = null;

    #[ORM\Column]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private ?bool $isPublished = null;

    #[ORM\Column]
    #[Groups([News::GROUP_NEWS_READ])]
    private DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'string', length: 255, enumType: EnumNewsCategory::class)]
    #[Groups([News::GROUP_NEWS_READ, News::GROUP_NEWS_WRITE])]
    private EnumNewsCategory $newsCategory;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(?string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getVideoUrl(): ?string
    {
        return $this->video_url;
    }

    public function setVideoUrl(?string $video_url): static
    {
        $this->video_url = $video_url;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getNewsCategory(): EnumNewsCategory
    {
        return $this->newsCategory;
    }

    public function setNewsCategory(EnumNewsCategory $newsCategory): static
    {
        $this->newsCategory = $newsCategory;

        return $this;
    }

}

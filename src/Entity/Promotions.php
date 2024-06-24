<?php

namespace App\Entity;

use App\Enum\EnumPromotionLimitDate;
use App\Repository\PromotionsRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PromotionsRepository::class)]
class Promotions
{
    const GROUP_PROMOTIONS_READ = 'promotions:read';
    const GROUP_PROMOTIONS_WRITE = 'promotions:write';

    public function __construct() {
        $this->createdAt = new DateTimeImmutable();
        $this->isPublished = false;
        $this->promotionLimitDate = EnumPromotionLimitDate::ONE_MONTH;
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ])]
    private DateTimeImmutable $createdAt;

    #[ORM\Column]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private DateTimeImmutable $limitDate;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?string $image_url = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?string $video_url = null;

    #[ORM\Column]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?bool $isPublished;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private ?Product $product = null;

    #[ORM\Column(type: 'string', length: 255, enumType: EnumPromotionLimitDate::class)]
    #[Groups([Promotions::GROUP_PROMOTIONS_READ, Promotions::GROUP_PROMOTIONS_WRITE])]
    private EnumPromotionLimitDate $promotionLimitDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }


    public function getLimitDate(): DateTimeImmutable
    {
        return $this->limitDate;
    }

    public function setLimitDate(DateTimeImmutable $limitDate): static
    {
        $this->limitDate = $limitDate;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getPromotionLimitDate(): EnumPromotionLimitDate
    {
        return $this->promotionLimitDate;
    }

    public function setPromotionLimitDate(EnumPromotionLimitDate $promotionLimitDate): static
    {
        $this->promotionLimitDate = $promotionLimitDate;

        return $this;
    }
}

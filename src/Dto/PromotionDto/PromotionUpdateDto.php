<?php

namespace App\Dto\PromotionDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


class PromotionUpdateDto
{
    const GROUP_PROMOTION_WRITE = 'promotion:write';


    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups([self::GROUP_PROMOTION_WRITE])]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[Groups([self::GROUP_PROMOTION_WRITE])]
    public string $description;

    #[Groups([self::GROUP_PROMOTION_WRITE])]
    public \DateTimeImmutable $limitDate;

    #[Groups([self::GROUP_PROMOTION_WRITE])]
    public ?string $image_url;

    #[Groups([self::GROUP_PROMOTION_WRITE])]
    public ?string $video_url;

    

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
     * Get the value of limitDate
     */
    public function getLimitDate(): \DateTimeImmutable
    {
        return $this->limitDate;
    }

    /**
     * Set the value of limitDate
     */
    public function setLimitDate(\DateTimeImmutable $limitDate): self
    {
        $this->limitDate = $limitDate;

        return $this;
    }

    /**
     * Get the value of image_url
     */
    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    /**
     * Set the value of image_url
     */
    public function setImageUrl(?string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * Get the value of video_url
     */
    public function getVideoUrl(): ?string
    {
        return $this->video_url;
    }

    /**
     * Set the value of video_url
     */
    public function setVideoUrl(?string $video_url): self
    {
        $this->video_url = $video_url;

        return $this;
    }
}

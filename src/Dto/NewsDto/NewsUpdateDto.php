<?php

namespace App\Dto\NewsDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NewsUpdateDto
{
    public const GROUP_NEWS_WRITE = 'news:write';


    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([self::GROUP_NEWS_WRITE])]
    public ?string $title;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    #[Groups([self::GROUP_NEWS_WRITE])]
    public ?string $content;

    #[Groups([self::GROUP_NEWS_WRITE])]
    public ?bool $isPublished;

    

    /**
     * Get the value of title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

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
}
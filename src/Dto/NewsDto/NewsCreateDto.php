<?php

namespace App\Dto\NewsDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NewsCreateDto
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
}
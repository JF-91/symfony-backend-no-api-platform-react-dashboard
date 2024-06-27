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
}
<?php

namespace App\Dto\NewsDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class NewsReadDto
{
    public const GROUP_NEWS_READ = 'news:read';


    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180)]
    #[Groups([self::GROUP_NEWS_READ])]
    public ?string $title;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    #[Groups([self::GROUP_NEWS_READ])]
    public ?string $content;

    #[Groups([self::GROUP_NEWS_READ])]
    public ?bool $isPublished;
}
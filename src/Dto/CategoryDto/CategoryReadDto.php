<?php

namespace App\Dto\CategoryDto;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;;

class CategoryReadDto
{
    const GROUP_CATEGORY_WRITE = 'category:write';


    #[Groups([self::GROUP_CATEGORY_WRITE])]
    public string $name;

    #[Groups([self::GROUP_CATEGORY_WRITE])]
    public \DateTimeImmutable $createdAt;

    #[Groups([self::GROUP_CATEGORY_WRITE])]
    public \DateTimeImmutable $updatedAt;


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
     * Get the value of createdAt
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     */
    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
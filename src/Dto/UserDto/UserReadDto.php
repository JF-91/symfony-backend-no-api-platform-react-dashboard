<?php

namespace App\Dto\UserDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class UserReadDto 
{
    const GROUP_USER_READ = 'user:read';

    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups([self::GROUP_USER_READ])]
    public string $email;

    #[Groups([self::GROUP_USER_READ])]
    public array $roles;

    #[Groups([self::GROUP_USER_READ])]
    public \DateTimeImmutable $createdAt;

    #[Groups([self::GROUP_USER_READ])]
    public string $firstName;

    #[Groups([self::GROUP_USER_READ])]
    public string $lastName;

    

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of roles
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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
     * Get the value of firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
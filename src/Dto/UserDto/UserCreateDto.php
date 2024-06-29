<?php 

namespace App\Dto\UserDto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
class UserCreateDto
{

    const GROUP_USER_WRITE = 'user:write';

    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups([self::GROUP_USER_WRITE])]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Length(min: 6)]
    #[Groups([self::GROUP_USER_WRITE])]
    public string $password;

    

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
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
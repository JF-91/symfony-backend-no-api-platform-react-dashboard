<?php 

namespace App\Dto\UserDto;

use App\Entity\ProductCategory;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
class UserUpdateDto
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


    #[Groups([self::GROUP_USER_WRITE])]
    public string $roles;

    #[Groups([self::GROUP_USER_WRITE])]
    public string $firstName;

    #[Groups([self::GROUP_USER_WRITE])]
    public string $lastName;

    #[Assert\NotBlank]
    #[Groups([self::GROUP_USER_WRITE])]
    public ProductCategory $productCategory;
    

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

    /**
     * Get the value of roles
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     */
    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

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
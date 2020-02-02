<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $username;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $Token;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Is_Active;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getToken(): ?int
    {
        return $this->Token;
    }

    public function setToken(int $Token): self
    {
        $this->Token = $Token;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->Is_Active;
    }

    public function setIsActive(bool $Is_Active): self
    {
        $this->Is_Active = $Is_Active;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
        //return ['ROLE_ADMIN'];
    }

    /**
     * @param mixed $roles
     */
    public function setRoles( $roles ): void
    {
        $this->roles = $roles;
    }
}

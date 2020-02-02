<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomeRepository")
 */
class Home
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ckeditor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCkeditor(): ?string
    {
        return $this->ckeditor;
    }

    public function setCkeditor(?string $ckeditor): self
    {
        $this->ckeditor = $ckeditor;

        return $this;
    }
}

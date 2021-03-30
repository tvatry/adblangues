<?php

namespace App\Entity;

use App\Repository\AnswerImportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerImportRepository::class)
 */
class AnswerImport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $csvFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCsvFile(): ?string
    {
        return $this->csvFile;
    }

    public function setCsvFile(string $csvFile): self
    {
        $this->csvFile = $csvFile;

        return $this;
    }
}

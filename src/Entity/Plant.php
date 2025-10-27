<?php

namespace App\Entity;

use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $planted_at = null;

    #[ORM\Column(length: 255)]
    private ?string $strain = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    private ?Space $space = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getPlantedAt(): ?\DateTimeImmutable
    {
        return $this->planted_at;
    }

    public function setPlantedAt(\DateTimeImmutable $planted_at): static
    {
        $this->planted_at = $planted_at;

        return $this;
    }

    public function getStrain(): ?string
    {
        return $this->strain;
    }

    public function setStrain(string $strain): static
    {
        $this->strain = $strain;

        return $this;
    }

    public function getSpace(): ?Space
    {
        return $this->space;
    }

    public function setSpace(?Space $space): static
    {
        $this->space = $space;

        return $this;
    }
}

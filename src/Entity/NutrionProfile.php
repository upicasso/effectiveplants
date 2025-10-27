<?php

namespace App\Entity;

use App\Repository\NutrionProfileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutrionProfileRepository::class)]
class NutrionProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $name = null;

    #[ORM\Column]
    private ?bool $phosphor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isName(): ?bool
    {
        return $this->name;
    }

    public function setName(bool $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isPhosphor(): ?bool
    {
        return $this->phosphor;
    }

    public function setPhosphor(bool $phosphor): static
    {
        $this->phosphor = $phosphor;

        return $this;
    }
}

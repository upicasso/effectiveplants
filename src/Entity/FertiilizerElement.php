<?php

namespace App\Entity;

use App\Repository\FertiilizerElementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FertiilizerElementRepository::class)]
class FertiilizerElement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $mg = null;

    #[ORM\ManyToOne(inversedBy: 'fertiilizerElements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fertilizer $fertilizer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getMg(): ?int
    {
        return $this->mg;
    }

    public function setMg(int $mg): static
    {
        $this->mg = $mg;

        return $this;
    }

    public function getFertilizer(): ?Fertilizer
    {
        return $this->fertilizer;
    }

    public function setFertilizer(?Fertilizer $fertilizer): static
    {
        $this->fertilizer = $fertilizer;

        return $this;
    }
}

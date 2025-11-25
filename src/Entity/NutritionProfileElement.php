<?php

namespace App\Entity;

use App\Repository\NutritionProfileElementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionProfileElementRepository::class)]
class NutritionProfileElement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $mg = null;

    #[ORM\ManyToOne(inversedBy: 'elements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NutritionProfile $nutritionProfile = null;

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

    public function getMg(): ?int
    {
        return $this->mg;
    }

    public function setMg(int $mg): static
    {
        $this->mg = $mg;

        return $this;
    }

    public function getNutritionProfile(): ?NutritionProfile
    {
        return $this->nutritionProfile;
    }

    public function setNutritionProfile(?NutritionProfile $nutritionProfile): static
    {
        $this->nutritionProfile = $nutritionProfile;

        return $this;
    }
}

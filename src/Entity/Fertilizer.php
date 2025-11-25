<?php

namespace App\Entity;

use App\Repository\FertilizerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FertilizerRepository::class)]
class Fertilizer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, NutritionProfileElement>
     */
    #[ORM\OneToMany(targetEntity: NutritionProfileElement::class, mappedBy: 'fertilizer')]
    private Collection $elements;
    
    public function __construct()
    {
        $this->elements = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, NutritionProfileElement>
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(NutritionProfileElement $element): static
    {
        if (!$this->elements->contains($element)) {
            $this->elements->add($element);
            $element->setFertilizer($this);
        }

        return $this;
    }

    public function removeElement(NutritionProfileElement $element): static
    {
        if ($this->elements->removeElement($element)) {
            // set the owning side to null (unless already changed)
            if ($element->getFertilizer() === $this) {
                $element->setFertilizer(null);
            }
        }

        return $this;
    }
}

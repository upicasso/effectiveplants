<?php

namespace App\Entity;

use App\Repository\NutrionProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutrionProfileRepository::class)]
class NutritionProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $name = null;

    /**
     * @var Collection<int, NutritionProfileElement>
     */
    #[ORM\OneToMany(targetEntity: NutritionProfileElement::class, mappedBy: 'nutritionProfile')]
    private Collection $elements;

    /**
     * @var Collection<int, NutritionProfileElement>
     */
    #[ORM\OneToMany(targetEntity: NutritionProfileElement::class, mappedBy: 'nutritionProfile', orphanRemoval: true)]
    private Collection $nutritionProfileElements;


    public function __construct()
    {
        $this->elements = new ArrayCollection();
        $this->nutritionProfileElements = new ArrayCollection();
    }

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
            $element->setNutritionProfile($this);
        }

        return $this;
    }

    public function removeElement(NutritionProfileElement $element): static
    {
        if ($this->elements->removeElement($element)) {
            // set the owning side to null (unless already changed)
            if ($element->getNutritionProfile() === $this) {
                $element->setNutritionProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NutritionProfileElement>
     */
    public function getNutritionProfileElements(): Collection
    {
        return $this->nutritionProfileElements;
    }

    public function addNutritionProfileElement(NutritionProfileElement $nutritionProfileElement): static
    {
        if (!$this->nutritionProfileElements->contains($nutritionProfileElement)) {
            $this->nutritionProfileElements->add($nutritionProfileElement);
            $nutritionProfileElement->setNutritionProfile($this);
        }

        return $this;
    }

    public function removeNutritionProfileElement(NutritionProfileElement $nutritionProfileElement): static
    {
        if ($this->nutritionProfileElements->removeElement($nutritionProfileElement)) {
            // set the owning side to null (unless already changed)
            if ($nutritionProfileElement->getNutritionProfile() === $this) {
                $nutritionProfileElement->setNutritionProfile(null);
            }
        }

        return $this;
    }

}

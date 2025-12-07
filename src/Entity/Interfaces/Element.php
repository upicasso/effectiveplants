<?php

namespace App\Entity\Interfaces;

/**
 * interface define that all elements must have the same functions.
 */
interface Element
{
    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(string $name): static;

    public function getMg(): ?int;
    public function setMg(int $mg): static;
}
<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAllergen;

    /**
     * @ORM\ManyToOne(targetEntity=Cake::class, inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredients;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsAllergen(): ?bool
    {
        return $this->isAllergen;
    }

    public function setIsAllergen(bool $isAllergen): self
    {
        $this->isAllergen = $isAllergen;

        return $this;
    }

    public function getCake(): ?Cake
    {
        return $this->cake;
    }

    public function setCake(?Cake $cake): self
    {
        $this->cake = $cake;

        return $this;
    }
}

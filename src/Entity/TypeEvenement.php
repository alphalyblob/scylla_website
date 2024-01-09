<?php

namespace App\Entity;

use App\Repository\TypeEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeEvenementRepository::class)]
class TypeEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Evenements::class, orphanRemoval: true)]
    private Collection $typeevenements;

    public function __construct()
    {
        $this->typeevenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Evenements>
     */
    public function getTypeevenements(): Collection
    {
        return $this->typeevenements;
    }

    public function addTypeevenement(Evenements $typeevenement): static
    {
        if (!$this->typeevenements->contains($typeevenement)) {
            $this->typeevenements->add($typeevenement);
            $typeevenement->setEvenement($this);
        }

        return $this;
    }

    public function removeTypeevenement(Evenements $typeevenement): static
    {
        if ($this->typeevenements->removeElement($typeevenement)) {
            // set the owning side to null (unless already changed)
            if ($typeevenement->getEvenement() === $this) {
                $typeevenement->setEvenement(null);
            }
        }

        return $this;
    }
}

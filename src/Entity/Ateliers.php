<?php

namespace App\Entity;

use App\Repository\AteliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AteliersRepository::class)]
class Ateliers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $label = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'atelier', targetEntity: Cours::class, orphanRemoval: true)]
    private Collection $cours;

    #[ORM\OneToMany(mappedBy: 'atelier', targetEntity: ImagesAteliers::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $imagesAteliers;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->imagesAteliers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setAtelier($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getAtelier() === $this) {
                $cour->setAtelier(null);
            }
        }

        return $this;
    }
    
    public function __toString(): string
    {
        return $this->label;
    }

    /**
     * @return Collection<int, ImagesAteliers>
     */
    public function getImagesAteliers(): Collection
    {
        return $this->imagesAteliers;
    }

    public function addImagesAtelier(ImagesAteliers $imagesAtelier): static
    {
        if (!$this->imagesAteliers->contains($imagesAtelier)) {
            $this->imagesAteliers->add($imagesAtelier);
            $imagesAtelier->setAtelier($this);
        }

        return $this;
    }

    public function removeImagesAtelier(ImagesAteliers $imagesAtelier): static
    {
        if ($this->imagesAteliers->removeElement($imagesAtelier)) {
            // set the owning side to null (unless already changed)
            if ($imagesAtelier->getAtelier() === $this) {
                $imagesAtelier->setAtelier(null);
            }
        }

        return $this;
    }
}

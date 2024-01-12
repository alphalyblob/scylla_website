<?php

namespace App\Entity;

use App\Repository\ParticipantsEvenementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantsEvenementsRepository::class)]
class ParticipantsEvenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'participantsEvenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherent $adherent = null;

    #[ORM\ManyToMany(targetEntity: Evenements::class, inversedBy: 'participantsEvenements')]
    private Collection $evenement;

    public function __construct()
    {
        $this->evenement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): static
    {
        $this->adherent = $adherent;

        return $this;
    }

    /**
     * @return Collection<int, Evenements>
     */
    public function getEvenement(): ?Collection
    {
        return $this->evenement;
    }

    public function addEvenement(?Evenements $evenement): static
    {
        if (!$this->evenement->contains($evenement)) {
            $this->evenement->add($evenement);
        }

        return $this;
    }

    public function removeEvenement(?Evenements $evenement): static
    {
        $this->evenement->removeElement($evenement);

        return $this;
    }
}

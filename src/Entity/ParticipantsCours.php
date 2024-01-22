<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\ParticipantCoursRepository;
use App\Repository\ParticipantsCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ParticipantsCoursRepository::class)]
class ParticipantsCours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'participantsCours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherent $adherent = null;

    #[ORM\ManyToMany(targetEntity: Cours::class, inversedBy: 'participantsCours')]
    private ?Collection $cours = null;

   

    public function __construct()
    {
        $this->cours = new ArrayCollection();
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
     * @return Collection<int, Cours>
     */
    public function getCours(): ?Collection
    {
        return $this->cours;
    }

    public function addCour(?Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
        }

        return $this;
    }

    public function removeCour(?Cours $cour): static
    {
        $this->cours->removeElement($cour);

        return $this;
    }

    public function __toString(): string
    {
        $elcours = $this->getCours()->first();

        return $elcours ? $elcours->getLabel() : '';
    }
}

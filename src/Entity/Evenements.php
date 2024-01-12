<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptif = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeEvenement $typeEvenement = null;


    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Medias::class, orphanRemoval: true)]
    private Collection $medias;

    #[ORM\ManyToMany(targetEntity: ParticipantsEvenements::class, mappedBy: 'evenement')]
    private Collection $participantsEvenements;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->participantsEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): static
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getTypeEvenement(): ?TypeEvenement
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(?TypeEvenement $typeEvenement): static
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    /**
     * @return Collection<int, Medias>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Medias $media): static
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
            $media->setEvenement($this);
        }

        return $this;
    }

    public function removeMedia(Medias $media): static
    {
        if ($this->medias->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getEvenement() === $this) {
                $media->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ParticipantsEvenements>
     */
    public function getParticipantsEvenements(): Collection
    {
        return $this->participantsEvenements;
    }

    public function addParticipantsEvenement(ParticipantsEvenements $participantsEvenement): static
    {
        if (!$this->participantsEvenements->contains($participantsEvenement)) {
            $this->participantsEvenements->add($participantsEvenement);
            $participantsEvenement->addEvenement($this);
        }

        return $this;
    }

    public function removeParticipantsEvenement(ParticipantsEvenements $participantsEvenement): static
    {
        if ($this->participantsEvenements->removeElement($participantsEvenement)) {
            $participantsEvenement->removeEvenement($this);
        }

        return $this;
    }
}

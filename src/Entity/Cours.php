<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $label = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptif = null;

    #[ORM\Column(length: 150)]
    private ?string $niveau = null;

    #[ORM\Column(length: 100)]
    private ?string $horaire = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $debutSaison = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finSaison = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ateliers $atelier = null;

    #[ORM\OneToMany(mappedBy: 'cours', targetEntity: Seances::class, orphanRemoval: true)]
    private Collection $seances;

    #[ORM\ManyToMany(targetEntity: ParticipantsCours::class, mappedBy: 'cours')]
    private Collection $participantsCours;

    #[ORM\OneToMany(mappedBy: 'cours', targetEntity: Medias::class, orphanRemoval: true)]
    private Collection $medias;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
        $this->participantsCours = new ArrayCollection();
        $this->medias = new ArrayCollection();
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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): static
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(string $horaire): static
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDebutSaison(): ?\DateTimeInterface
    {
        return $this->debutSaison;
    }

    public function setDebutSaison(\DateTimeInterface $debutSaison): static
    {
        $this->debutSaison = $debutSaison;

        return $this;
    }

    public function getFinSaison(): ?\DateTimeInterface
    {
        return $this->finSaison;
    }

    public function setFinSaison(\DateTimeInterface $finSaison): static
    {
        $this->finSaison = $finSaison;

        return $this;
    }

    public function getAtelier(): ?Ateliers
    {
        return $this->atelier;
    }

    public function setAtelier(?Ateliers $atelier): static
    {
        $this->atelier = $atelier;

        return $this;
    }

    /**
     * @return Collection<int, Seances>
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seances $seance): static
    {
        if (!$this->seances->contains($seance)) {
            $this->seances->add($seance);
            $seance->setCours($this);
        }

        return $this;
    }

    public function removeSeance(Seances $seance): static
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getCours() === $this) {
                $seance->setCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ParticipantCours>
     */
    public function getParticipantsCours(): Collection
    {
        return $this->participantsCours;
    }

    public function addParticipantCours(ParticipantsCours $participantCours): static
    {
        if (!$this->participantsCours->contains($participantCours)) {
            $this->participantsCours->add($participantCours);
            $participantCours->addCour($this);
        }

        return $this;
    }

    public function removeParticipantCours(ParticipantsCours $participantCours): static
    {
        if ($this->participantsCours->removeElement($participantCours)) {
            $participantCours->removeCour($this);
        }

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
            $media->setCours($this);
        }

        return $this;
    }

    public function removeMedia(Medias $media): static
    {
        if ($this->medias->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getCours() === $this) {
                $media->setCours(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->label;
    }
}

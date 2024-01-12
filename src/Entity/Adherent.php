<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: AdherentRepository::class)]
class Adherent implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToOne(mappedBy: 'adherent', cascade: ['persist', 'remove'])]
    private ?InfosAdherent $infosAdherent = null;

    #[ORM\OneToMany(mappedBy: 'adherent', targetEntity: ParticipantsCours::class, orphanRemoval: true)]
    private Collection $participantsCours;

    #[ORM\OneToOne(mappedBy: 'adherent', cascade: ['persist', 'remove'])]
    private ?MembresEquipe $membresequipe = null;

    #[ORM\OneToMany(mappedBy: 'adherent', targetEntity: ParticipantsEvenements::class, orphanRemoval: true)]
    private Collection $participantsEvenements;

    public function __construct()
    {
        $this->participantsCours = new ArrayCollection();
        $this->participantsEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getInfosAdherent(): ?InfosAdherent
    {
        return $this->infosAdherent;
    }

    public function setInfosAdherent(InfosAdherent $infosAdherent): static
    {
        // set the owning side of the relation if necessary
        if ($infosAdherent->getAdherent() !== $this) {
            $infosAdherent->setAdherent($this);
        }

        $this->infosAdherent = $infosAdherent;

        return $this;
    }

    /**
     * @return Collection<int, ParticipantsCours>
     */
    public function getParticipantsCours(): Collection
    {
        return $this->participantsCours;
    }

    public function addParticipantsCours(ParticipantsCours $participantCours): static
    {
        if (!$this->participantsCours->contains($participantCours)) {
            $this->participantsCours->add($participantCours);
            $participantCours->setAdherent($this);
        }

        return $this;
    }

    public function removeParticipantsCours(ParticipantsCours $participantCours): static
    {
        if ($this->participantsCours->removeElement($participantCours)) {
            // set the owning side to null (unless already changed)
            if ($participantCours->getAdherent() === $this) {
                $participantCours->setAdherent(null);
            }
        }

        return $this;
    }

    public function getMembresequipe(): ?MembresEquipe
    {
        return $this->membresequipe;
    }

    public function setMembresequipe(MembresEquipe $membresequipe): static
    {
        // set the owning side of the relation if necessary
        if ($membresequipe->getAdherent() !== $this) {
            $membresequipe->setAdherent($this);
        }

        $this->membresequipe = $membresequipe;

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
            $participantsEvenement->setAdherent($this);
        }

        return $this;
    }

    public function removeParticipantsEvenement(ParticipantsEvenements $participantsEvenement): static
    {
        if ($this->participantsEvenements->removeElement($participantsEvenement)) {
            // set the owning side to null (unless already changed)
            if ($participantsEvenement->getAdherent() === $this) {
                $participantsEvenement->setAdherent(null);
            }
        }

        return $this;
    }


}

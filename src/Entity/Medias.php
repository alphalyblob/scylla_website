<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MediasRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass=MediasRepository::class)
 * @Vich\Uploadable
 */
class Medias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length=70)
     */
    private ?string $titre = null;

    /**
     * @ORM\Column(length=255)
     */
    private ?string $chemin = null;

    /**
     * @ORM\Column
     */
    private ?int $taille = null;

    /**
     * @ORM\ManyToOne(inversedBy="medias")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Cours $cours = null;

    /**
     * @ORM\ManyToOne(inversedBy="medias")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Evenements $evenement = null;

    /**
     * @ORM\Column(length=100)
     */
    private ?string $mediaFormat = null;

    /**
     * @Vich\UploadableField(mapping="media_uploads", fileNameProperty="chemin")
     * @var File|null
     */
    private ?File $imageFile = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $dateCreation = null;

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

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(string $chemin): static
    {
        $this->chemin = $chemin;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): static
    {
        $this->cours = $cours;

        return $this;
    }

    public function getEvenement(): ?Evenements
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenements $evenement): static
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getMediaFormat(): ?string
    {
        return $this->mediaFormat;
    }

    public function setMediaFormat(string $mediaFormat): static
    {
        $this->mediaFormat = $mediaFormat;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): static
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->dateCreation = new \DateTime('now');
        }

        return $this;
    }
}

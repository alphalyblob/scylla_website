<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImagesAteliersRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImagesAteliersRepository::class)]
#[Vich\Uploadable]
class ImagesAteliers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'evenements', fileNameProperty: 'nom', size: 'taille')]
    private ?File $file = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $taille = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'imagesAteliers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ateliers $atelier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;

        if(null != $file){
            $this->updatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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

    public function __toString()
    {
        return $this->nom;
    }
}

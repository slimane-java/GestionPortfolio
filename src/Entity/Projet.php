<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Experiences::class, inversedBy="projets")
     * @ORM\JoinColumn(nullable=true)
     */
    private $experiences;

    /**
     * @var Mession[]|Collection
     * @ORM\OneToMany(targetEntity=Mession::class, mappedBy="projets")
     */
    private $messions;

    public function __construct()
    {
        $this->messions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getExperiences(): ?Experiences
    {
        return $this->experiences;
    }

    public function setExperiences(?Experiences $experiences): self
    {
        $this->experiences = $experiences;

        return $this;
    }

    public function __toString()
    {
        return $this->titre.'';
    }

    /**
     * @return Collection|Mession[]
     */
    public function getMessions(): Collection
    {
        return $this->messions;
    }

    public function setMessions($messions)
    {
        $this->messions = $messions;
    }

    public function addMession(Mession $mession): self
    {
        if (!$this->messions->contains($mession)) {
            $this->messions[] = $mession;
            $mession->setProjets($this);
        }

        return $this;
    }

    public function removeMession(Mession $mession): self
    {
        if ($this->messions->removeElement($mession)) {
            // set the owning side to null (unless already changed)
            if ($mession->getProjets() === $this) {
                $mession->setProjets(null);
            }
        }

        return $this;
    }
}

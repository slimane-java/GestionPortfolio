<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 * @Gedmo\Loggable()
 * @ORM\HasLifecycleCallbacks()
 */
class Experiences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actuellement;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @var Projet[]|Collection
     * @ORM\OneToMany(targetEntity=Projet::class, mappedBy="experiences", fetch="LAZY", orphanRemoval=true)
     */
    private $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function setProjets($projets)
    {
        $this->projets = $projets;
    }

    public function addProjet(Projet $projet): self
    {
        $this->projets->add($projet);

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        $this->projets->removeElement($projet);

        return $this;
    }

    public function __toString()
    {
        return $this->dateDebut->format('d-m-Y').'->'.$this->dateFin->format('d-m-Y').'';
    }
}

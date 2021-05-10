<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @Gedmo\Loggable()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups={"admin_post_formation"})
     */
    private $deplome;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups={"admin_post_formation"})
     */
    private $ecole;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeplome(): ?string
    {
        return $this->deplome;
    }

    public function setDeplome(?string $deplome): self
    {
        $this->deplome = $deplome;

        return $this;
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

    public function getEcole(): ?string
    {
        return $this->ecole;
    }

    public function setEcole(?string $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = (bool)$enabled;

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
}

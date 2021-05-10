<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjetEntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProjetEntrepriseRepository::class)
 */
class ProjetEntreprise extends Projet
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
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailEntreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionEntreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeEmploye;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(?string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getEmailEntreprise(): ?string
    {
        return $this->emailEntreprise;
    }

    public function setEmailEntreprise(?string $emailEntreprise): self
    {
        $this->emailEntreprise = $emailEntreprise;

        return $this;
    }

    public function getDescriptionEntreprise(): ?string
    {
        return $this->descriptionEntreprise;
    }

    public function setDescriptionEntreprise(?string $descriptionEntreprise): self
    {
        $this->descriptionEntreprise = $descriptionEntreprise;

        return $this;
    }

    public function getTypeEmploye(): ?string
    {
        return $this->typeEmploye;
    }

    public function setTypeEmploye(?string $typeEmploye): self
    {
        $this->typeEmploye = $typeEmploye;

        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(?string $post): self
    {
        $this->post = $post;

        return $this;
    }
}

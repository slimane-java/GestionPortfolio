<?php

namespace App\Entity;

use App\Repository\TypeCompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCompetenceRepository::class)
 */
class TypeCompetence
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
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity=Competence::class, inversedBy="typeCompetences")
     * @ORM\JoinColumn(nullable=true)
     */
    private $competences;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCompetences(): ?Competence
    {
        return $this->competences;
    }

    public function setCompetences(?Competence $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->label;
    }

}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
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
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="competences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @var TypeCompetence[]|Collection
     * @ORM\OneToMany(targetEntity=TypeCompetence::class, mappedBy="competences", orphanRemoval=true)
     */
    private $typeCompetences;

    public function __construct()
    {
        $this->typeCompetences = new ArrayCollection();
    }

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
     * @return Collection|Competence[]
     */
    public function getTypeCompetences(): Collection
    {
        return $this->typeCompetences;
    }

    public function setTypeCompetences($typeCompetences)
    {
        $this->typeCompetences = $typeCompetences;

        return $this;
    }

    public function addTypeCompetences(TypeCompetence $typeCompetence): self
    {
        if (!$this->typeCompetences->contains($typeCompetence)) {
            $this->typeCompetences[] = $typeCompetence;
            $typeCompetence->setCompetences($this);
        }

        return $this;
    }

    public function removeTypeCompetence(TypeCompetence $typeCompetence): self
    {
        if ($this->typeCompetences->removeElement($typeCompetence)) {
            // set the owning side to null (unless already changed)
            if ($typeCompetence->getCompetences() === $this) {
                $typeCompetence->setCompetences(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->label.'';
    }
}

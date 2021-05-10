<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource()
 * @Gedmo\Loggable()
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"email"})
 * @UniqueEntity(fields={"tell"})
 * @UniqueEntity(fields={"linkdine"})
 * @UniqueEntity(fields={"github"})
 * @UniqueEntity(fields={"facebook"})
 */
class Client extends BaseUser
{
    use TimestampTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tell;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkdine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $github;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facebook;

    protected $plainPassword;

    /**
     * @ORM\OneToMany(targetEntity=Competence::class, mappedBy="client")
     */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity=Langages::class, mappedBy="client")
     */
    private $langages;

    public function __construct()
    {
        parent::__construct();
        $this->addRole(Role::ROLE_CLIENT);
        $this->competences = new ArrayCollection();
        $this->langages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTell(): ?string
    {
        return $this->tell;
    }

    public function setTell(string $tell): self
    {
        $this->tell = $tell;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getLinkdine(): ?string
    {
        return $this->linkdine;
    }

    public function setLinkdine(string $linkdine): self
    {
        $this->linkdine = $linkdine;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function setEmail($email): self
    {
        $this->email = $email;
        $this->username = $email;

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setClient($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getClient() === $this) {
                $competence->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langages[]
     */
    public function getLangages(): Collection
    {
        return $this->langages;
    }

    public function addLangage(Langages $langage): self
    {
        if (!$this->langages->contains($langage)) {
            $this->langages[] = $langage;
            $langage->setClient($this);
        }

        return $this;
    }

    public function removeLangage(Langages $langage): self
    {
        if ($this->langages->removeElement($langage)) {
            // set the owning side to null (unless already changed)
            if ($langage->getClient() === $this) {
                $langage->setClient(null);
            }
        }

        return $this;
    }
}

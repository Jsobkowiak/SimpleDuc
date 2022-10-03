<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datefin = null;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: User::class)]
    private Collection $propriétaire;

    #[ORM\ManyToMany(targetEntity: Equipe::class, mappedBy: 'projet')]
    private Collection $equipes;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: User::class)]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'projets')]
    private ?Tache $taches = null;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: Responsable::class)]
    private Collection $responsables;

    public function __construct()
    {
        $this->propriétaire = new ArrayCollection();
        $this->equipes = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->responsables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(?\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPropriétaire(): Collection
    {
        return $this->propriétaire;
    }

    public function addPropriTaire(User $propriTaire): self
    {
        if (!$this->propriétaire->contains($propriTaire)) {
            $this->propriétaire->add($propriTaire);
            $propriTaire->setProjet($this);
        }

        return $this;
    }

    public function removePropriTaire(User $propriTaire): self
    {
        if ($this->propriétaire->removeElement($propriTaire)) {
            // set the owning side to null (unless already changed)
            if ($propriTaire->getProjet() === $this) {
                $propriTaire->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->addProjet($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            $equipe->removeProjet($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setProjet($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getProjet() === $this) {
                $user->setProjet(null);
            }
        }

        return $this;
    }

    public function getTaches(): ?Tache
    {
        return $this->taches;
    }

    public function setTaches(?Tache $taches): self
    {
        $this->taches = $taches;

        return $this;
    }

    /**
     * @return Collection<int, Responsable>
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(Responsable $responsable): self
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables->add($responsable);
            $responsable->setProjet($this);
        }

        return $this;
    }

    public function removeResponsable(Responsable $responsable): self
    {
        if ($this->responsables->removeElement($responsable)) {
            // set the owning side to null (unless already changed)
            if ($responsable->getProjet() === $this) {
                $responsable->setProjet(null);
            }
        }

        return $this;
    }
}

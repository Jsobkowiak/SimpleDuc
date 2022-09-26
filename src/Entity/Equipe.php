<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'equipe')]
    private ?Projet $projet = null;

    #[ORM\OneToMany(mappedBy: 'equipe', targetEntity: User::class)]
    private Collection $salarie;

    public function __construct()
    {
        $this->salarie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getSalarie(): Collection
    {
        return $this->salarie;
    }

    public function addSalarie(User $salarie): self
    {
        if (!$this->salarie->contains($salarie)) {
            $this->salarie->add($salarie);
            $salarie->setEquipe($this);
        }

        return $this;
    }

    public function removeSalarie(User $salarie): self
    {
        if ($this->salarie->removeElement($salarie)) {
            // set the owning side to null (unless already changed)
            if ($salarie->getEquipe() === $this) {
                $salarie->setEquipe(null);
            }
        }

        return $this;
    }
}

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

    #[ORM\ManyToMany(targetEntity: Projet::class, inversedBy: 'equipes')]
    private Collection $projet;

    #[ORM\ManyToMany(targetEntity: Developpeur::class, mappedBy: 'Equipe')]
    private Collection $developpeurs;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    private ?Salarié $salarié = null;

    public function __construct()
    {
        $this->projet = new ArrayCollection();
        $this->developpeurs = new ArrayCollection();
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

    /**
     * @return Collection<int, Projet>
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet->add($projet);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        $this->projet->removeElement($projet);

        return $this;
    }

    /**
     * @return Collection<int, Developpeur>
     */
    public function getDeveloppeurs(): Collection
    {
        return $this->developpeurs;
    }

    public function addDeveloppeur(Developpeur $developpeur): self
    {
        if (!$this->developpeurs->contains($developpeur)) {
            $this->developpeurs->add($developpeur);
            $developpeur->addEquipe($this);
        }

        return $this;
    }

    public function removeDeveloppeur(Developpeur $developpeur): self
    {
        if ($this->developpeurs->removeElement($developpeur)) {
            $developpeur->removeEquipe($this);
        }

        return $this;
    }

    public function getSalarié(): ?Salarié
    {
        return $this->salarié;
    }

    public function setSalarié(?Salarié $salarié): self
    {
        $this->salarié = $salarié;

        return $this;
    }
}

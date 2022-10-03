<?php

namespace App\Entity;

use App\Repository\BulletinDePaieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BulletinDePaieRepository::class)]
class BulletinDePaie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $taux_horaire = null;

    #[ORM\Column]
    private ?float $nbHeureTravaillé = null;

    #[ORM\Column(length: 255)]
    private ?string $Mois = null;

    #[ORM\OneToMany(mappedBy: 'bulletin', targetEntity: Salarié::class)]
    private Collection $salari;

    public function __construct()
    {
        $this->salari = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTauxHoraire(): ?float
    {
        return $this->taux_horaire;
    }

    public function setTauxHoraire(float $taux_horaire): self
    {
        $this->taux_horaire = $taux_horaire;

        return $this;
    }

    public function getNbHeureTravaillé(): ?float
    {
        return $this->nbHeureTravaillé;
    }

    public function setNbHeureTravaillé(float $nbHeureTravaillé): self
    {
        $this->nbHeureTravaillé = $nbHeureTravaillé;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->Mois;
    }

    public function setMois(string $Mois): self
    {
        $this->Mois = $Mois;

        return $this;
    }

    /**
     * @return Collection<int, Salarié>
     */
    public function getSalari(): Collection
    {
        return $this->salari;
    }

    public function addSalari(Salarié $salari): self
    {
        if (!$this->salari->contains($salari)) {
            $this->salari->add($salari);
            $salari->setBulletin($this);
        }

        return $this;
    }

    public function removeSalari(Salarié $salari): self
    {
        if ($this->salari->removeElement($salari)) {
            // set the owning side to null (unless already changed)
            if ($salari->getBulletin() === $this) {
                $salari->setBulletin(null);
            }
        }

        return $this;
    }
}

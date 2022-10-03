<?php

namespace App\Entity;

use App\Repository\DeveloppeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeveloppeurRepository::class)]
class Developpeur extends Salarié
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'developpeurs')]
    private Collection $Equipe;

    public function __construct()
    {
        $this->Equipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipe(): Collection
    {
        return $this->Equipe;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->Equipe->contains($equipe)) {
            $this->Equipe->add($equipe);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        $this->Equipe->removeElement($equipe);

        return $this;
    }
}

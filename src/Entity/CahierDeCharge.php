<?php

namespace App\Entity;

use App\Repository\CahierDeChargeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CahierDeChargeRepository::class)]
class CahierDeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Projet $Projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjet(): ?Projet
    {
        return $this->Projet;
    }

    public function setProjet(Projet $Projet): self
    {
        $this->Projet = $Projet;

        return $this;
    }
}

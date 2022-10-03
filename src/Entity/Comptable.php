<?php

namespace App\Entity;

use App\Repository\ComptableRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Salarié;

#[ORM\Entity(repositoryClass: ComptableRepository::class)]
class Comptable extends Salarié
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}   

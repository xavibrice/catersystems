<?php

namespace App\Entity;

use App\Repository\StateElectricityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateElectricityRepository::class)
 */
class StateElectricity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Electricity::class, mappedBy="stateElectricity")
     */
    private $electricity;

    public function __construct()
    {
        $this->electricity = new ArrayCollection();
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

    /**
     * @return Collection|Electricity[]
     */
    public function getElectricity(): Collection
    {
        return $this->electricity;
    }

    public function addElectricity(Electricity $electricity): self
    {
        if (!$this->electricity->contains($electricity)) {
            $this->electricity[] = $electricity;
            $electricity->setStateElectricity($this);
        }

        return $this;
    }

    public function removeElectricity(Electricity $electricity): self
    {
        if ($this->electricity->removeElement($electricity)) {
            // set the owning side to null (unless already changed)
            if ($electricity->getStateElectricity() === $this) {
                $electricity->setStateElectricity(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

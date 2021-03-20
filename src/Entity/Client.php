<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $full_name;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $dni_cif;

    /**
     * @ORM\OneToMany(targetEntity=Electricity::class, mappedBy="client")
     */
    private $electricities;

    /**
     * @ORM\OneToMany(targetEntity=Installation::class, mappedBy="client")
     */
    private $installations;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $created;

    public function __construct()
    {
        $this->electricities = new ArrayCollection();
        $this->installations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDniCif(): ?string
    {
        return $this->dni_cif;
    }

    public function setDniCif(?string $dni_cif): self
    {
        $this->dni_cif = $dni_cif;

        return $this;
    }

    /**
     * @return Collection|Electricity[]
     */
    public function getElectricities(): Collection
    {
        return $this->electricities;
    }

    public function addElectricity(Electricity $electricity): self
    {
        if (!$this->electricities->contains($electricity)) {
            $this->electricities[] = $electricity;
            $electricity->setClient($this);
        }

        return $this;
    }

    public function removeElectricity(Electricity $electricity): self
    {
        if ($this->electricities->removeElement($electricity)) {
            // set the owning side to null (unless already changed)
            if ($electricity->getClient() === $this) {
                $electricity->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Installation[]
     */
    public function getInstallations(): Collection
    {
        return $this->installations;
    }

    public function addInstallation(Installation $installation): self
    {
        if (!$this->installations->contains($installation)) {
            $this->installations[] = $installation;
            $installation->setClient($this);
        }

        return $this;
    }

    public function removeInstallation(Installation $installation): self
    {
        if ($this->installations->removeElement($installation)) {
            // set the owning side to null (unless already changed)
            if ($installation->getClient() === $this) {
                $installation->setClient(null);
            }
        }

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function __toString()
    {
        return $this->full_name . ' - ' . $this->dni_cif;
    }
}

<?php

namespace App\Entity;

use App\Repository\ServiceManagerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceManagerRepository::class)
 */
class ServiceManager
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\ManyToMany(targetEntity=ActivosTecnos::class, mappedBy="responsable")
     */
    private $activosTecnos;

    public function __construct()
    {
        $this->activosTecnos = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|ActivosTecnos[]
     */
    public function getActivosTecnos(): Collection
    {
        return $this->activosTecnos;
    }

    public function addActivosTecno(ActivosTecnos $activosTecno): self
    {
        if (!$this->activosTecnos->contains($activosTecno)) {
            $this->activosTecnos[] = $activosTecno;
            $activosTecno->addResponsable($this);
        }

        return $this;
    }

    public function removeActivosTecno(ActivosTecnos $activosTecno): self
    {
        if ($this->activosTecnos->removeElement($activosTecno)) {
            $activosTecno->removeResponsable($this);
        }

        return $this;
    }
}

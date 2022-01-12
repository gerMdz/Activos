<?php

namespace App\Entity;

use App\Repository\ServiceManagerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

/**
 * @ORM\Entity(repositoryClass=ServiceManagerRepository::class)
 */
class ServiceManager
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private UuidV4 $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phone;

    /**
     * @ORM\ManyToMany(targetEntity=ActivosTecnos::class, mappedBy="responsable")
     */
    private ?Collection $activosTecnos;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private ?User $usuario;

    public function __construct()
    {
        $this->activosTecnos = new ArrayCollection();
        $this->id = Uuid::v4();

    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?Uuid
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

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}

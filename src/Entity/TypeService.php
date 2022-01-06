<?php

namespace App\Entity;

use App\Repository\TypeServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeServiceRepository::class)
 */
class TypeService
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=ActivosTecnos::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $activosTecnos;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActivosTecnos(): ?ActivosTecnos
    {
        return $this->activosTecnos;
    }

    public function setActivosTecnos(?ActivosTecnos $activosTecnos): self
    {
        // unset the owning side of the relation if necessary
        if ($activosTecnos === null && $this->activosTecnos !== null) {
            $this->activosTecnos->setType(null);
        }

        // set the owning side of the relation if necessary
        if ($activosTecnos !== null && $activosTecnos->getType() !== $this) {
            $activosTecnos->setType($this);
        }

        $this->activosTecnos = $activosTecnos;

        return $this;
    }
}

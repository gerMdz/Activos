<?php

namespace App\Entity;

use App\Repository\ServiceProviderUsedRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

/**
 * @ORM\Entity(repositoryClass=ServiceProviderUsedRepository::class)
 */
class ServiceProviderUsed
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
     * @ORM\Column(type="string", length=255)
     */
    private ?string $website;

    /**
     * @ORM\OneToOne(targetEntity=ActivosTecnos::class, mappedBy="usedProvider", cascade={"persist", "remove"})
     */
    private ?ActivosTecnos $activosTecnos;

    public function __construct()
    {
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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

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
            $this->activosTecnos->setUsedProvider(null);
        }

        // set the owning side of the relation if necessary
        if ($activosTecnos !== null && $activosTecnos->getUsedProvider() !== $this) {
            $activosTecnos->setUsedProvider($this);
        }

        $this->activosTecnos = $activosTecnos;

        return $this;
    }
}

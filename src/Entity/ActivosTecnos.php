<?php

namespace App\Entity;

use App\Repository\ActivosTecnosRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

/**
 * @ORM\Entity(repositoryClass=ActivosTecnosRepository::class)
 */
class ActivosTecnos
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
     * @ORM\OneToOne(targetEntity=TypeService::class, inversedBy="activosTecnos", cascade={"persist", "remove"})
     */
    private ?TypeService $type;

    /**
     * @ORM\OneToOne(targetEntity=ServiceProviderUsed::class, inversedBy="activosTecnos", cascade={"persist", "remove"})
     */
    private ?ServiceProviderUsed $usedProvider;

    /**
     * @ORM\Column(type="string", length=510)
     */
    private ?string $urlweb;

    /**
     * @ORM\ManyToMany(targetEntity=ServiceManager::class, inversedBy="activosTecnos")
     */
    private ArrayCollection $responsable;

    /**
     * @ORM\OneToOne(targetEntity=ServerData::class, cascade={"persist", "remove"})
     */
    private ?ServerData $dataServe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $plan;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?DateTimeImmutable $expirationAt;

    /**
     * @ORM\ManyToMany(targetEntity=ActivosTecnos::class, inversedBy="activosTecnos")
     */
    private ArrayCollection $needTo;

    /**
     * @ORM\ManyToMany(targetEntity=ActivosTecnos::class, mappedBy="needTo")
     */
    private ArrayCollection $activosTecnos;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $isPublicView;

    public function __construct()
    {
        $this->responsable = new ArrayCollection();
        $this->needTo = new ArrayCollection();
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

    public function getType(): ?TypeService
    {
        return $this->type;
    }

    public function setType(?TypeService $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUsedProvider(): ?ServiceProviderUsed
    {
        return $this->usedProvider;
    }

    public function setUsedProvider(?ServiceProviderUsed $usedProvider): self
    {
        $this->usedProvider = $usedProvider;

        return $this;
    }

    public function getUrlweb(): ?string
    {
        return $this->urlweb;
    }

    public function setUrlweb(string $urlweb): self
    {
        $this->urlweb = $urlweb;

        return $this;
    }

    /**
     * @return Collection|ServiceManager[]
     */
    public function getResponsable(): Collection
    {
        return $this->responsable;
    }

    public function addResponsable(ServiceManager $responsable): self
    {
        if (!$this->responsable->contains($responsable)) {
            $this->responsable[] = $responsable;
        }

        return $this;
    }

    public function removeResponsable(ServiceManager $responsable): self
    {
        $this->responsable->removeElement($responsable);

        return $this;
    }

    public function getDataServe(): ?ServerData
    {
        return $this->dataServe;
    }

    public function setDataServe(?ServerData $dataServe): self
    {
        $this->dataServe = $dataServe;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(?string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getExpirationAt(): ?DateTimeImmutable
    {
        return $this->expirationAt;
    }

    public function setExpirationAt(?DateTimeImmutable $expirationAt): self
    {
        $this->expirationAt = $expirationAt;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getNeedTo(): Collection
    {
        return $this->needTo;
    }

    public function addNeedTo(self $needTo): self
    {
        if (!$this->needTo->contains($needTo)) {
            $this->needTo[] = $needTo;
        }

        return $this;
    }

    public function removeNeedTo(self $needTo): self
    {
        $this->needTo->removeElement($needTo);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getActivosTecnos(): Collection
    {
        return $this->activosTecnos;
    }

    public function addActivosTecno(self $activosTecno): self
    {
        if (!$this->activosTecnos->contains($activosTecno)) {
            $this->activosTecnos[] = $activosTecno;
            $activosTecno->addNeedTo($this);
        }

        return $this;
    }

    public function removeActivosTecno(self $activosTecno): self
    {
        if ($this->activosTecnos->removeElement($activosTecno)) {
            $activosTecno->removeNeedTo($this);
        }

        return $this;
    }

    public function getIsPublicView(): ?bool
    {
        return $this->isPublicView;
    }

    public function setIsPublicView(?bool $isPublicView): self
    {
        $this->isPublicView = $isPublicView;

        return $this;
    }
}

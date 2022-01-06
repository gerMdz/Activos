<?php

namespace App\Entity;

use App\Repository\ServerDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServerDataRepository::class)
 */
class ServerData
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
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $datauser;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $datapass;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getDatauser()
    {
        return $this->datauser;
    }

    public function setDatauser($datauser): self
    {
        $this->datauser = $datauser;

        return $this;
    }

    public function getDatapass()
    {
        return $this->datapass;
    }

    public function setDatapass($datapass): self
    {
        $this->datapass = $datapass;

        return $this;
    }

}

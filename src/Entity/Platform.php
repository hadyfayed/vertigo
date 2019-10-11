<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatformRepository")
 */
class Platform
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $Name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Connection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Host;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Port;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $DbName;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $DbUsername;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DbPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getConnection(): ?int
    {
        return $this->Connection;
    }

    public function setConnection(int $Connection): self
    {
        $this->Connection = $Connection;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->Host;
    }

    public function setHost(string $Host): self
    {
        $this->Host = $Host;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->Port;
    }

    public function setPort(string $Port): self
    {
        $this->Port = $Port;

        return $this;
    }

    public function getDbName(): ?string
    {
        return $this->DbName;
    }

    public function setDbName(string $DbName): self
    {
        $this->DbName = $DbName;

        return $this;
    }

    public function getDbUsername(): ?string
    {
        return $this->DbUsername;
    }

    public function setDbUsername(string $DbUsername): self
    {
        $this->DbUsername = $DbUsername;

        return $this;
    }

    public function getDbPassword(): ?string
    {
        return $this->DbPassword;
    }

    public function setDbPassword(string $DbPassword): self
    {
        $this->DbPassword = $DbPassword;

        return $this;
    }
}

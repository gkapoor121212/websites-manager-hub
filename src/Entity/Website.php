<?php

namespace App\Entity;

use App\Repository\WebsiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebsiteRepository::class)]
class Website
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 2048)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasHttpAuth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $httpAuthUsername = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $httpAuthPassword = null;

    #[ORM\Column(length: 2048, nullable: true)]
    private ?string $adminLoginUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $server = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $notes = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated = null;

    public function __construct()
    {
        $this->created = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function hasHttpAuth(): ?bool
    {
        return $this->hasHttpAuth;
    }

    public function setHasHttpAuth(?bool $hasHttpAuth): static
    {
        $this->hasHttpAuth = $hasHttpAuth;

        return $this;
    }

    public function getHttpAuthUsername(): ?string
    {
        return $this->httpAuthUsername;
    }

    public function setHttpAuthUsername(?string $httpAuthUsername): static
    {
        $this->httpAuthUsername = $httpAuthUsername;

        return $this;
    }

    public function getHttpAuthPassword(): ?string
    {
        return $this->httpAuthPassword;
    }

    public function setHttpAuthPassword(?string $httpAuthPassword): static
    {
        $this->httpAuthPassword = $httpAuthPassword;

        return $this;
    }

    public function getAdminLoginURL(): ?string
    {
        return $this->adminLoginUrl;
    }

    public function setAdminLoginURL(?string $adminLoginUrl): static
    {
        $this->adminLoginUrl = $adminLoginUrl;

        return $this;
    }

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(?string $server): static
    {
        $this->server = $server;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreated(): ?\DateTimeImmutable
    {
        return $this->created;
    }

    public function setCreated(\DateTimeImmutable $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeImmutable
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeImmutable $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getHostname(): string
    {
        return parse_url($this->url, PHP_URL_HOST) ?? $this->url;
    }
}

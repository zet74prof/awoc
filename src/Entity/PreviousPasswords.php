<?php

namespace App\Entity;

use App\Repository\PreviousPasswordsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreviousPasswordsRepository::class)]
class PreviousPasswords
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'previousPasswords')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @param string|null $password
     * @param \DateTimeInterface|null $date
     * @param User|null $user
     */
    public function __construct(?string $password, ?\DateTimeInterface $date, ?User $user)
    {
        $this->password = $password;
        $this->date = $date;
        $this->user = $user;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}

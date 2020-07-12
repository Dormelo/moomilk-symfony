<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("email")
 * @UniqueEntity("name")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Cow::class, mappedBy="user")
     */
    private $cows;

    public function __construct()
    {
        $this->cows = new ArrayCollection();
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

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Cow[]
     */
    public function getCows(): Collection
    {
        return $this->cows;
    }

    public function addCow(Cow $cow): self
    {
        if (!$this->cows->contains($cow)) {
            $this->cows[] = $cow;
            $cow->setUser($this);
        }

        return $this;
    }

    public function removeCow(Cow $cow): self
    {
        if ($this->cows->contains($cow)) {
            $this->cows->removeElement($cow);
            // set the owning side to null (unless already changed)
            if ($cow->getUser() === $this) {
                $cow->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}

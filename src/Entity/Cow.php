<?php

namespace App\Entity;

use App\Repository\CowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CowRepository::class)
 */
class Cow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bornAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $matricule;

    /**
     * @ORM\OneToMany(targetEntity=Milking::class, mappedBy="cow")
     */
    private $milkings;

    public function __construct()
    {
        $this->milkings = new ArrayCollection();
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

    public function getBornAt(): ?\DateTimeInterface
    {
        return $this->bornAt;
    }

    public function setBornAt(\DateTimeInterface $bornAt): self
    {
        $this->bornAt = $bornAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * @return Collection|Milking[]
     */
    public function getMilkings(): Collection
    {
        return $this->milkings;
    }

    public function addMilking(Milking $milking): self
    {
        if (!$this->milkings->contains($milking)) {
            $this->milkings[] = $milking;
            $milking->setCow($this);
        }

        return $this;
    }

    public function removeMilking(Milking $milking): self
    {
        if ($this->milkings->contains($milking)) {
            $this->milkings->removeElement($milking);
            // set the owning side to null (unless already changed)
            if ($milking->getCow() === $this) {
                $milking->setCow(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

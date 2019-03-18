<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConjugaisonsRepository")
 */
class Conjugaisons
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $orders;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mode", inversedBy="conjugaisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Mode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Verbs", inversedBy="conjugaisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Verbs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pronoms", inversedBy="conjugaisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pronoms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="Conjusaison")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrders(): ?int
    {
        return $this->orders;
    }

    public function setOrders(int $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getMode(): ?Mode
    {
        return $this->Mode;
    }

    public function setMode(?Mode $Mode): self
    {
        $this->Mode = $Mode;

        return $this;
    }

    public function getVerbs(): ?Verbs
    {
        return $this->Verbs;
    }

    public function setVerbs(?Verbs $Verbs): self
    {
        $this->Verbs = $Verbs;

        return $this;
    }

    public function getPronoms(): ?Pronoms
    {
        return $this->Pronoms;
    }

    public function setPronoms(?Pronoms $Pronoms): self
    {
        $this->Pronoms = $Pronoms;

        return $this;
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

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addConjusaison($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeConjusaison($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

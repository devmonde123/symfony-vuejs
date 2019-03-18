<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PronomsRepository")
 */
class Pronoms
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
    private $slug;

    /**
     * @ORM\Column(type="integer")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conjugaisons", mappedBy="Pronoms")
     */
    private $conjugaisons;

    public function __construct()
    {
        $this->conjugaisons = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    /**
     * @return Collection|Conjugaisons[]
     */
    public function getConjugaisons(): Collection
    {
        return $this->conjugaisons;
    }

    public function addConjugaison(Conjugaisons $conjugaison): self
    {
        if (!$this->conjugaisons->contains($conjugaison)) {
            $this->conjugaisons[] = $conjugaison;
            $conjugaison->setPronoms($this);
        }

        return $this;
    }

    public function removeConjugaison(Conjugaisons $conjugaison): self
    {
        if ($this->conjugaisons->contains($conjugaison)) {
            $this->conjugaisons->removeElement($conjugaison);
            // set the owning side to null (unless already changed)
            if ($conjugaison->getPronoms() === $this) {
                $conjugaison->setPronoms(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

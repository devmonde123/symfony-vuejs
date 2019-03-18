<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerbsRepository")
 */
class Verbs
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
     * @ORM\Column(type="string", length=255)
     */
    private $orders;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="verbs")
     */
    private $Language;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conjugaisons", mappedBy="Verbs")
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getOrders(): ?string
    {
        return $this->orders;
    }

    public function setOrders(string $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->Language;
    }

    public function setLanguage(?Language $Language): self
    {
        $this->Language = $Language;

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

    
    public function __toString()
    {
        return $this->name;
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
            $conjugaison->setVerbs($this);
        }

        return $this;
    }

    public function removeConjugaison(Conjugaisons $conjugaison): self
    {
        if ($this->conjugaisons->contains($conjugaison)) {
            $this->conjugaisons->removeElement($conjugaison);
            // set the owning side to null (unless already changed)
            if ($conjugaison->getVerbs() === $this) {
                $conjugaison->setVerbs(null);
            }
        }

        return $this;
    }
}

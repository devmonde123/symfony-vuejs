<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeRepository")
 */
class Mode
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
     * @ORM\Column(type="integer")
     */
    private $orders;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Temps", inversedBy="modes")
     */
    private $temps;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="modes")
     */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conjugaisons", mappedBy="Mode")
     */
    private $conjugaisons;

   

    public function __construct()
    {
        $this->temps = new ArrayCollection();
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

    public function getOrders(): ?int
    {
        return $this->orders;
    }

    public function setOrders(int $orders): self
    {
        $this->orders = $orders;

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

    public function getLangue(): ?Language
    {
        return $this->Langue;
    }

    public function setLangue(?Language $Langue): self
    {
        $this->Langue = $Langue;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Temps[]
     */
    public function getTemps(): Collection
    {
        return $this->temps;
    }

    public function addTemp(Temps $temp): self
    {
        if (!$this->temps->contains($temp)) {
            $this->temps[] = $temp;
        }

        return $this;
    }

    public function removeTemp(Temps $temp): self
    {
        if ($this->temps->contains($temp)) {
            $this->temps->removeElement($temp);
        }

        return $this;
    }

    public function getLangues(): ?Language
    {
        return $this->langues;
    }

    public function setLangues(?Language $langues): self
    {
        $this->langues = $langues;

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
            $conjugaison->setMode($this);
        }

        return $this;
    }

    public function removeConjugaison(Conjugaisons $conjugaison): self
    {
        if ($this->conjugaisons->contains($conjugaison)) {
            $this->conjugaisons->removeElement($conjugaison);
            // set the owning side to null (unless already changed)
            if ($conjugaison->getMode() === $this) {
                $conjugaison->setMode(null);
            }
        }

        return $this;
    }

  
}

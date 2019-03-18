<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LanguageRepository")
 */
class Language
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
    private $country;

    /**
     * @ORM\Column(type="integer")
     */
    private $orders;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mode", mappedBy="langues")
     */
    private $modes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Verbs", mappedBy="Language")
     */
    private $verbs;

    public function __construct()
    {
        $this->modes = new ArrayCollection();
        $this->verbs = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Mode[]
     */
    public function getModes(): Collection
    {
        return $this->modes;
    }

    public function addMode(Mode $mode): self
    {
        if (!$this->modes->contains($mode)) {
            $this->modes[] = $mode;
            $mode->setLangues($this);
        }

        return $this;
    }

    public function removeMode(Mode $mode): self
    {
        if ($this->modes->contains($mode)) {
            $this->modes->removeElement($mode);
            // set the owning side to null (unless already changed)
            if ($mode->getLangues() === $this) {
                $mode->setLangues(null);
            }
        }

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    /**
     * @return Collection|Verbs[]
     */
    public function getVerbs(): Collection
    {
        return $this->verbs;
    }

    public function addVerb(Verbs $verb): self
    {
        if (!$this->verbs->contains($verb)) {
            $this->verbs[] = $verb;
            $verb->setLanguage($this);
        }

        return $this;
    }

    public function removeVerb(Verbs $verb): self
    {
        if ($this->verbs->contains($verb)) {
            $this->verbs->removeElement($verb);
            // set the owning side to null (unless already changed)
            if ($verb->getLanguage() === $this) {
                $verb->setLanguage(null);
            }
        }

        return $this;
    }
}

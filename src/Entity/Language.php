<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
#[ApiResource]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 3)]
    private $code;

    #[ORM\ManyToMany(targetEntity: Country::class, mappedBy: 'languages')]
    private $countries;

    #[ORM\ManyToMany(targetEntity: Event::class, mappedBy: 'languages')]
    private $yes;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Country[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->addLanguage($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->removeElement($country)) {
            $country->removeLanguage($this);
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Event $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->addLanguage($this);
        }

        return $this;
    }

    public function removeYe(Event $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            $ye->removeLanguage($this);
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[ApiResource]
class 	City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Country::class, inversedBy: 'cities')]
    #[ORM\JoinColumn(nullable: false)]
    private $country;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Event::class)]
    private $events;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Organizer::class)]
    private $organizers;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Venue::class)]
    private $venues;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->organizers = new ArrayCollection();
        $this->venues = new ArrayCollection();
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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setCity($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getCity() === $this) {
                $event->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Organizer[]
     */
    public function getOrganizers(): Collection
    {
        return $this->organizers;
    }

    public function addOrganizer(Organizer $organizer): self
    {
        if (!$this->organizers->contains($organizer)) {
            $this->organizers[] = $organizer;
            $organizer->setCity($this);
        }

        return $this;
    }

    public function removeOrganizer(Organizer $organizer): self
    {
        if ($this->organizers->removeElement($organizer)) {
            // set the owning side to null (unless already changed)
            if ($organizer->getCity() === $this) {
                $organizer->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Venue[]
     */
    public function getVenues(): Collection
    {
        return $this->venues;
    }

    public function addVenue(Venue $venue): self
    {
        if (!$this->venues->contains($venue)) {
            $this->venues[] = $venue;
            $venue->setCity($this);
        }

        return $this;
    }

    public function removeVenue(Venue $venue): self
    {
        if ($this->venues->removeElement($venue)) {
            // set the owning side to null (unless already changed)
            if ($venue->getCity() === $this) {
                $venue->setCity(null);
            }
        }

        return $this;
    }

    public function getLatitude(): ?float
    {
        // TODO:
        return 0.0;
    }

    public function getLongitude(): ?float
    {
        // TODO:
        return 0.0;
    }
}

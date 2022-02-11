<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use App\Controller\Event\GetEventItemsController;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get',
        'get_items' => [
            'method' => 'GET',
            'path' => '/event/items',
            'requirements' => [],
            'controller' => GetEventItemsController::class,
        ],
    ],
)]
#[ApiFilter(DateFilter::class, properties: ['start_datetime'])]
#[Table(name: "event")]
class Event
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_src;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_alt;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $wp_id;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 19)]
    private $start_datetime;

    #[ORM\Column(type: 'string', length: 19, nullable: true)]
    private $end_datetime;

    #[ORM\Column(type: 'string', length: 63, nullable: true)]
    private $timezone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $url;

    #[ORM\Column(type: 'string', length: 63, nullable: true)]
    private $size_label;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private $size_type;

    #[ORM\Column(type: 'integer')]
    private $cost;

    #[ORM\ManyToMany(targetEntity: EventCategory::class, inversedBy: 'events')]
    private $category;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'events')]
    private $city;

    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'yes')]
    private $languages;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->languages = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImgSrc(): ?string
    {
        return $this->img_src;
    }

    public function setImgSrc(?string $img_src): self
    {
        $this->img_src = $img_src;

        return $this;
    }

    public function getImgAlt(): ?string
    {
        return $this->img_alt;
    }

    public function setImgAlt(?string $img_alt): self
    {
        $this->img_alt = $img_alt;

        return $this;
    }

    public function getWpId(): ?int
    {
        return $this->wp_id;
    }

    public function setWpId(?int $wp_id): self
    {
        $this->wp_id = $wp_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDatetime(): ?string
    {
        return $this->start_datetime;
    }

    public function setStartDatetime(string $start_datetime): self
    {
        $this->start_datetime = $start_datetime;

        return $this;
    }

    public function getEndDatetime(): ?string
    {
        return $this->end_datetime;
    }

    public function setEndDatetime(?string $end_datetime): self
    {
        $this->end_datetime = $end_datetime;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSizeLabel(): ?string
    {
        return $this->size_label;
    }

    public function setSizeLabel(?string $size_label): self
    {
        $this->size_label = $size_label;

        return $this;
    }

    public function getSizeType(): ?int
    {
        return $this->size_type;
    }

    public function setSizeType(?int $size_type): self
    {
        $this->size_type = $size_type;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return Collection|EventCategory[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(EventCategory $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(EventCategory $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->languages->removeElement($language);

        return $this;
    }
}

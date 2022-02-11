<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventSizeTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventSizeTypeRepository::class)]
#[ApiResource]
class EventSizeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $min_count;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $max_count;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMinCount(): ?int
    {
        return $this->min_count;
    }

    public function setMinCount(?int $min_count): self
    {
        $this->min_count = $min_count;

        return $this;
    }

    public function getMaxCount(): ?int
    {
        return $this->max_count;
    }

    public function setMaxCount(?int $max_count): self
    {
        $this->max_count = $max_count;

        return $this;
    }
}

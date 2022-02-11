<?php

declare(strict_types=1);

namespace App\Dto\Event;

use App\Entity\Event;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class EventMarkerList
{
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    public ?\DateTimeInterface $refreshDate = null;

    /**
     * @var EventMarker[]
     */
    private array $markers;

    public function __construct()
    {
        $this->refreshDate = new \DateTime();
    }

    public function addMarker(Event $event): void
    {
        $this->markers[] = EventMarker::createFromEntity($event);
    }

    public function getMarkers(): array
    {
        return $this->markers;
    }

    public function getResponseCode(): int
    {
        // Todo
        return 200;
    }
}
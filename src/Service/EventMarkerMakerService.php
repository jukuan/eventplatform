<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Event\EventMarkerList;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;

class EventMarkerMakerService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getMarkerList(): EventMarkerList
    {
        $eventRepository = $this->entityManager->getRepository(Event::class);
        $events = $eventRepository->findAll();

        $markerList = new EventMarkerList();

        foreach ($events as $event) {
            $markerList->addMarker();
        }

        return $markerList;
    }
}

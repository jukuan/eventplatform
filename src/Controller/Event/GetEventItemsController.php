<?php

declare(strict_types=1);

namespace App\Controller\Event;

use App\Dto\Event\EventMarkerList;
use App\Service\EventMarkerMakerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEventItemsController
{
    private EntityManagerInterface $entityManager;
    private EventMarkerMakerService $eventMarkerMakerService;

    public function __construct(
        EntityManagerInterface $entityManager,
        EventMarkerMakerService $eventMarkerMakerService
    ) {
        $this->entityManager = $entityManager;
        $this->eventMarkerMakerService = $eventMarkerMakerService;
    }

    public function __invoke(): object
    {
        $markerList = $this->eventMarkerMakerService->getMarkerList();

        return new JsonResponse([
            'statusCode' => $markerList->getStatusCode(),
            'data' => [
                'markers' => $markerList->getMarkers(),
            ],
        ]);
    }
}
